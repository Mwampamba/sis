@include('admin.includes.header')

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
    <!-- Navbar -->
    @include('admin.includes.navbar')

    <!-- Main Sidebar Container -->

    @include('admin.includes.sidebar')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h3 class="m-0">Semesters</h3>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('semesters')}}">Home</a></li>
                <li class="breadcrumb-item active">Update semester</li>
                </ol>
            </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Update semester 
                                            <a href="{{ route('semesters')}}" class="btn btn-danger float-right">BACK</a> 
                                        </h4>
                                    </div>
                                    <div class="card-body">
                                        <form action="{{ url('/auth/semesters/'.$semester->id)}}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="row">
                                                <div class="col-md-6 mb-3">
                                                    <label for="">Name</label>
                                                    <input type="text" name="name" class="form-control" value="{{ $semester->name }}" placeholder="Enter semester name" />
                                                    @error('name')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label for="">Academic year</label>
                                                    <select name="year" class="form-control">
                                                        <option value="">Select academic year</option>
                                                        @foreach($years as $year)
                                                            <option value="{{ $year->id }}" {{ $year->id == $semester->academic_year_id ? 'selected' : '' }}>{{ $year->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="col-md-12 mb-3">
                                                    <label for="">Description</label>
                                                    <textarea name="description" class="form-control" rows="5">{{ $semester->description }}</textarea>
                                                </div>
                                                <div class="col-md-4 mb-3">
                                                    <label for="">Status</label>
                                                    <select name="status" class="form-control">
                                                        <option value="">Select status</option>
                                                        <option value="1" {{ $semester->status == '1' ? 'selected':'' }}>Active</option>
                                                        <option value="0" {{ $semester->status == '0' ? 'selected':'' }}>Not active</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-12 mb-3">
                                                    <button type="submit" class="btn btn-primary">Update</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>  
                                </div>
                        </div>
                    </div>
                </div>
        <!-- /.content -->
        </section>
    </div>
    <!-- /.content-wrapper -->
    @include('admin.includes.footer')