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
                                            <h3 class="m-0">Departments
                                                <a href="{{route('addDepartment')}}" class="btn btn-success float-right">Add new department</a> 
                                            </h3>
                                        </div>
                                            <div class="card-body">
                                                <div class="card">
                                                    
                                                <table id="myDataTable" class="table table-bordered">
                                                    <thead>
                                                        <tr> 
                                                            <th>#</th>
                                                            <th>Departiment name</th>   
                                                            <th>Description</th>                                   
                                                            <th>Action</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($departments as $index=>$department)
                                                            <tr>
                                                                <td>{{ $index+1 }}</td>
                                                                <td>{{ $department->name }}</td>
                                                                <td>{{ $department->description }}</td>
                                                                <td><a href="{{ route('editDepartment', $department->id) }}" class="btn btn-warning">Edit</a></td>
                                                                <td><a href="{{ route('deleteDepartment', $department->id) }}" onclick="return confirm('Are you sure you want to delete this department?')" class="btn btn-danger">Delete</a></td>
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