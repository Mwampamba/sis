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
                <h3 class="m-0">Courses</h3>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('dashboard')}}">Home</a></li>
                <li class="breadcrumb-item active">Courses</li>
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
                                        <h4>Update course 
                                            <a href="{{ route('courses')}}" class="btn btn-danger float-right">BACK</a> 
                                        </h4>
                                    </div>
                                    <div class="card-body">
                                        <form action="{{ url('/auth/courses/'.$course->id)}}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="row">
                                                <div class="col-md-6 mb-3">
                                                    <label for="">Name</label>
                                                    <input type="text" name="name" class="form-control" value="{{ $course->title }}" placeholder="Course name" />
                                                    @error('name')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label for="">Code</label>
                                                    <input type="text" name="code" class="form-control" value="{{ $course->code }}" placeholder="Course code" />
                                                    @error('code')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label for="">Core or elective</label>
                                                    <select name="status" class="form-control">
                                                        <option value="">Select core or elective</option>
                                                            <option value="1" {{ $course->status == '1' ? 'selected': '' }}>Core</option>
                                                            <option value="0" {{ $course->status == '0' ? 'selected': '' }}>Optional</option>
                                                    </select>
                                                    @error('status')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <div class="col-md-6 mb-3">
                                                    <label for="">Credit</label>
                                                    <input type="text" name="credit" class="form-control" value="{{ $course->credit }}" placeholder="Course credit" />
                                                    @error('credit')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
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