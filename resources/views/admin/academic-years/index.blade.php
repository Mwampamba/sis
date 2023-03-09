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
                                        <h3>Academic years
                                            <a href="{{ route('addAcademicYear')}}" class="btn btn-success float-right">Add new academic year</a>
                                            <a href="{{ route('getDeactivatedAcademicYears')}}" class="btn btn-danger float-right" style="margin-right: 5px;">View deactivated academic years</a>
                                        </h3> 
                                    </div>
                                        <div class="card-body">
                                            <div class="card">
                                            <table id="myDataTable" class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Academic year</th>   
                                                        <th>Description</th>  
                                                        <th>Status</th>                                      
                                                        <th>Action</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($years as $index=>$year)
                                                        <tr>
                                                            <td>{{ $index+1 }}</td>
                                                            <td>{{ $year->name }}</td>
                                                            <td>{{ $year->description }}</td>
                                                            <td>{{ $year->status == '1' ? 'Active' : 'Deactivated' }}</td>
                                                            <td><a href="{{ route('editAcademicYear', $year->id) }}" class="btn btn-warning">Edit</a></td>
                                                            <td><a href="{{ route('deactivateAcademicYear', $year->id) }}" onclick="return confirm('Are you sure you want to deactivate this year?')" class="btn btn-danger">Deactivate</a></td>
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