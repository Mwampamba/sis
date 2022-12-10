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
                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
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
                                    @if(auth()->user()->role == '1')
                                    <div class="card-header">
                                        <a href="#" class="btn btn-primary float-left">Bulk assign lecturer courses</a> 
                                            <a href="{{ route('addLecturerCourses') }}" class="btn btn-success float-right">Assign lecturer courses</a> 
                                    </div>
                                    @endif
                                        <div class="card-body">
                                            <div class="card">
                                                @if(Session::has('success'))
                                                    <div class="alert alert-success" role="alert">{{ Session::get('success') }}</div>
                                                 @endif
                                            <table id="myDataTable" class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Course title</th> 
                                                        <th>Lecturer name</th>                              
                                                        @if(auth()->user()->role == '1')
                                                        <th>Edit</th>
                                                        <th>Delete</th>
                                                        @endif
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($lecturer_courses as $index=>$data)
                                                        <tr>
                                                            <td>{{ $index+1 }}</td>
                                                            <td>{{ $data->title }}</td>
                                                            <td>{{ $data->name }}</td>
                                                            @if(auth()->user()->role == '1')
                                                            <td><a href="#" class="btn btn-warning">Edit</a></td>
                                                            <td><a href="#" onclick="return confirm('Are you sure you want to delete this data?')" class="btn btn-danger">Delete</a></td>
                                                            @endif
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
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