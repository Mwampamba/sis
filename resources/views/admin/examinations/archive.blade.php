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
                                    @can('isAdmin')
                                        <div class="card-header">
                                            <h3>Inactive examinations
                                                <a href="{{ route('examinations')}}" class="btn btn-danger float-right">BACK</a> 
                                            </h3> 
                                        </div>
                                    @endcan
                                        <div class="card-body">
                                            <div class="card">
                                            <table id="myDataTable" class="table table-bordered">
                                                <thead>
                                                    <tr> 
                                                        <th>#</th>
                                                        <th>Examination name</th>
                                                        <th>Academic year</th>
                                                        <th>Status</th>
                                                        <th>Action</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($exams as $index=>$exam)
                                                        <tr>
                                                            <td>{{ $index+1 }}</td>
                                                            <td>{{ $exam->exam_name }}</td>
                                                            <td>{{ $exam->semester->name }} :: {{ $exam->academic_year->name}}</td>
                                                            <td>{{ $exam->status == 1 ? 'Active' : 'Deactivated' }}</td>
                                                            <td><a href="{{ route('deleteExamination', $exam->id) }}" onclick="return confirm('Are you sure you want to delete permanent this exam?')" class="btn btn-danger">Delete</a></td>
                                                            <td><a href="{{ route('restoreExamination', $exam->id) }}" class="btn btn-success">Activate</a></td>
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