@include('admin.includes.header')

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper"> 
    @include('admin.includes.navbar') 

    @include('admin.includes.sidebar') 
    <div class="content-wrapper"> 
        <div class="content-header">
        </div> 
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                                <div class="card"> 
                                    <div class="card-header">
                                        <h3>Examinations
                                            <a href="{{ route('addExamType')}}" class="btn btn-success float-right">Add new examination</a> 
                                        </h3>
                                    </div>
                                        <div class="card-body">
                                            <div class="card">
                                            <table id="myDataTable" class="table table-bordered">
                                                <thead>
                                                    <tr> 
                                                        <th>#</th>
                                                        <th>Examination name</th>
                                                        <th>Description</th>  
                                                        <th>Status</th>                                     
                                                        <th>Action</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($exams as $index=>$exam)
                                                        <tr>
                                                            <td>{{ $index+1 }}</td>
                                                            <td>{{ $exam->exam_type }}</td>
                                                            <td>{{ $exam->description }}</td>
                                                            <td>{{ $exam->status == 1 ? 'Active' : 'Deactivated' }}</td>
                                                            <td><a href="/auth/exam-type/{{$exam->id}}" class="btn btn-warning">Edit</a></td>
                                                            <td><a href="/auth/exam-type/deactivate/{{$exam->id}}" onclick="return confirm('Are you sure you want to delete this examination?')" class="btn btn-danger">Deactivate</a></td>
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