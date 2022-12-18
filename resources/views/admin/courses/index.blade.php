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
                                        <a href="{{route('bulkAddCourses')}}" class="btn btn-primary float-left">Bulk import courses</a> 
                                            <a href="{{route('addCourse')}}" class="btn btn-success float-right">Add course</a> 
                                    </div>
                                    @endif
                                        <div class="card-body">
                                            <div class="card">
                                            <table id="myDataTable" class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Course title</th> 
                                                        <th>Code</th>
                                                        <th>Core or elective</th> 
                                                        <th>Credits</th>                                
                                                        @if(auth()->user()->role == '1')
                                                        <th>Edit</th>
                                                        <th>Delete</th>
                                                        @endif
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($courses as $index=>$course)
                                                        <tr>
                                                            <td>{{ $index+1 }}</td>
                                                            <td>{{ $course->title }}</td>
                                                            <td>{{ $course->code }}</td>
                                                            <td>{{ $course->status == '1' ? 'Core' : 'Optional' }}</td>
                                                            <td>{{ $course->credit }}</td>
                                                            @if(auth()->user()->role == '1')
                                                            <td><a href="/auth/courses/{{$course->id}}" class="btn btn-warning">Edit</a></td>
                                                            <td><a href="/auth/courses/delete/{{$course->id}}" onclick="return confirm('Are you sure you want to delete this course?')" class="btn btn-danger">Delete</a></td>
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