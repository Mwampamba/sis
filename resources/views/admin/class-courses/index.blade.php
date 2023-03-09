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
                                        <h3>Class courses 
                                            <a href="{{ route('addClassCourses') }}" class="btn btn-success float-right">Add courses in class</a> 
                                        </h3>
                                    </div>
                                    @endif
                                        <div class="card-body">
                                            <div class="card">
                                                 <table id="myDataTable" class="table table-bordered">
                                                    <thead>
                                                        <tr>
                                                            {{-- <th><input type="checkbox" name="ids" class="checkAllClass" value="" /></th> --}}
                                                            <th>#</th> 
                                                            <th>Course title</th> 
                                                            <th>Course code</th>
                                                            <th>Class | Programme of study</th>                            
                                                            @if(auth()->user()->role == '1')
                                                            <th>Action</th>
                                                            @endif
                                                        </tr> 
                                                    </thead>
                                                    <tbody>
                                                        @foreach($class_courses as $index=>$class_course)
                                                            <tr>
                                                                {{-- <td><input type="checkbox" name="ids" class="checkSingleClass" value="{{ $class_course->id}}" /></td> --}}
                                                                <td>{{ $index+1 }}</td>
                                                                <td>{{ $class_course->title }}</td>
                                                                <td>{{ $class_course->code }}</td>
                                                                <td>{{ $class_course->name }} :: {{ $class_course->programme->name }}</td>
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