@include('admin.includes.header')

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper"> 
    @include('admin.includes.navbar') 
    @include('admin.includes.sidebar') 
    <div class="content-wrapper"> 
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                                <div class="card">
                                    
                                    <div class="card-header">
                                        <h3>Lecturer courses
                                            @if(auth()->user()->role == '1')
                                                <a href="{{ route('addLecturerCourses') }}" class="btn btn-success float-right">Assign lecturer courses</a>   
                                            @endif
                                         </h3>  
                                    </div>
                                        <div class="card-body">
                                            <div class="card">
                                            <table id="myDataTable" class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Course title</th> 
                                                        <th>Code</th>                              
                                                        @if(auth()->user()->role == '1')
                                                        <th>Action</th>
                                                        @endif
                                                    </tr>
                                                </thead>
                                                <tbody> 
                                                    @foreach($lecturer_courses as $index=>$lecturer_course)
                                                        <tr>
                                                            <td>{{ $index+1 }}</td>
                                                            <td>{{ $lecturer_course->title }}</td>
                                                            <td>{{ $lecturer_course->code }}</td>
                                                            @if(auth()->user()->role == '1')
                                                            <td><a href="/auth/lecturer-courses/remove/{{$lecturer_course->id}}/{{$lecturer_course->user_id}}" onclick="return confirm('Are you sure you want to delete this data?')" class="btn btn-danger">Remove</a></td>
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