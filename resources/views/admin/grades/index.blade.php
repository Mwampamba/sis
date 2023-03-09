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
                                    <div class="card-header">
                                        <h3>Grades
                                            <a href="{{route('addGrade')}}" class="btn btn-success float-right">Add new grade</a> 
                                        </h3>
                                    </div>
                                        <div class="card-body">
                                            <div class="card">
                                            <table id="myDataTable" class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Grade</th> 
                                                        <th>Point</th>
                                                        <th>Marks from</th> 
                                                        <th>Marks up to</th>  
                                                        <th>Remarks</th>                                 
                                                        <th>Action</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($grades as $index=>$grade)
                                                        <tr>
                                                            <td>{{ $index+1 }}</td>
                                                            <td>{{ $grade->grade_name }}</td>
                                                            <td>{{ $grade->point }}</td>
                                                            <td>{{ $grade->mark_from }}</td>
                                                            <td>{{ $grade->mark_up_to }}</td>
                                                            <td>{{ $grade->remarks }}</td>
                                                            <td><a href="{{ route('editGrade', $grade->id) }}" class="btn btn-warning">Edit</a></td>
                                                            <td><a href="{{ route('deleteGrade', $grade->id) }}" onclick="return confirm('Are you sure you want to delete this grade?')" class="btn btn-danger">Delete</a></td>
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