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
                <h3 class="m-0">Class courses</h3>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                <li class="breadcrumb-item active">Class courses</li>
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
                                        <a href="{{ route('bulkAddClassCourses')}}" class="btn btn-primary float-left">Bulk import courses in class</a> 
                                            <a href="{{ route('addClassCourses') }}" class="btn btn-success float-right">Add courses in class</a> 
                                    </div>
                                    @endif
                                        <div class="card-body">
                                            <div class="card">
                                                 <table id="myDataTable" class="table table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Course title</th> 
                                                            <th>Class</th>                            
                                                            @if(auth()->user()->role == '1')
                                                            <th>Action</th>
                                                            @endif
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($class_courses as $index=>$class_course)
                                                            <tr>
                                                                <td>{{ $index+1 }}</td>
                                                                <td>{{ $class_course->title }}</td>
                                                                <td>{{ $class_course->name }} -- {{ $class_course->programme->name }}</td>
                                                                @if(auth()->user()->role == '1')
                                                                <td><a href="/auth/class-courses/remove/{{$class_course->id}}/{{$class_course->class_id}}" onclick="return confirm('Are you sure you want to delete this data?')" class="btn btn-danger">Remove</a></td>
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