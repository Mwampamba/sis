@include('admin.includes.header')

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper"> 
    @include('admin.includes.navbar') 

    @include('admin.includes.sidebar') 
    <div class="content-wrapper"> 
        <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            </div> 
        </div> 
        </div> 
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                                <div class="card">
                                    @if(auth()->user()->role == '1')
                                    <div class="card-header">
                                        <h3>Courses
                                            <a href="{{route('addCourse')}}" class="btn btn-success float-right" style="margin-right: 5px;">Add new course</a> 
                                            <a href="{{route('bulkAddCourses')}}" class="btn btn-primary float-right" style="margin-right: 5px;">Add new course(s) using excel</a> 
                                        </h3>
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
                                                        <th>Action</th>
                                                        <th>Action</th>
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
                                                            <td><a href="/auth/courses/delete/{{$course->id}}" onclick="return confirm('Are you sure you want to deactivate this course?')" class="btn btn-danger">Deactivate</a></td>
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