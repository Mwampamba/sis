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
                <h3 class="m-0">Programmes</h3>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                <li class="breadcrumb-item active">Programmes</li>
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
                                        <h4>Update programme 
                                            <a href="{{ route('programmes')}}" class="btn btn-danger float-right">BACK</a> 
                                        </h4>
                                    </div>
                                    <div class="card-body">
                                        <form action="{{ url('/auth/programmes/'.$programme->id)}}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="row">
                                                <div class="col-md-6 mb-3">
                                                    <label for="">Name</label>
                                                    <input type="text" name="name" value="{{ $programme->name }}" class="form-control" placeholder="Enter programme name" />
                                                    @error('name')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label for="">Collage</label>
                                                    <select name="collage" class="form-control">
                                                        <option value="">Select collage</option>
                                                        @foreach($collages as $collage)
                                                            <option value="{{ $collage->id }}" {{ $collage->id == $programme->collage_id ? 'selected' : '' }}>{{ $collage->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('collage')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="col-md-12 mb-3">
                                                    <label for="">Description</label>
                                                    <textarea name="description" class="form-control" rows="5">{{ $programme->description }}</textarea>
                                                </div>

                                                <div class="col-md-6 mb-3">
                                                    <label for="">Status</label>
                                                    <select name="status" class="form-control">
                                                        <option value="">Select status</option>
                                                        <option value="1" {{ $programme->status == '1' ? 'selected': '' }}>Active</option>
                                                        <option value="0" {{ $programme->status == '0' ? 'selected': '' }}>Not active</option>
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