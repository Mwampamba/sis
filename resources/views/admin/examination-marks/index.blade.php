@include('admin.includes.header')

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper"> 
    @include('admin.includes.navbar') 

    @include('admin.includes.sidebar') 
    <div class="content-wrapper"> 
        <div class="content-header">
        <div class="container-fluid">
        </div> 
        </div> 
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3>Select class to mark examination
                                            <a href="{{ route('examinations')}}" class="btn btn-danger float-right">BACK</a> 
                                        </h3>
                                    </div>
                                        <div class="card-body">
                                            <div class="card">
                                            <table id="myDataTable" class="table table-bordered">
                                                <thead>
                                                    <tr> 
                                                        <th>#</th>
                                                        <th>Class name | Programme of study </th>
                                                        <th>Examination name</th>
                                                         <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($class_exams as $index=>$class_exam)
                                                        <tr>
                                                            <td>{{ $index+1 }}</td>
                                                            <td>{{ $class_exam->classname }} :: {{ $class_exam->programme_id == 1 ? 'Bachelor of Science in Computer Engineering and IT' : 'Bachelor in Business and Administration' }}</td>
                                                            <td>{{ $class_exam->exam_name }}</td>
                                                            <td><a href="/auth/examinations/classes/marks-exam/{{$class_exam->class_id}}/{{$class_exam->exam_id}}" class="btn btn-secondary">View | Add marks</a></td>
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