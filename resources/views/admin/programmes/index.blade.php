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
                <h3 class="m-0">Programmes</h3>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                <li class="breadcrumb-item active">Programmes</li>
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
                                    <div class="card-header">
                                        <a href="#" class="btn btn-primary float-left">Bulk import programmes</a> 
                                            <a href="{{route('addProgramme')}}" class="btn btn-success float-right">Add programme</a> 
                                    </div>
                                        <div class="card-body">
                                            <div class="card">
                                            <table id="myDataTable" class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Name</th> 
                                                        <th>Collage</th>
                                                        <th>Status</th>                                      
                                                        <th>Edit</th>
                                                        <th>Delete</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($programmes as $index=>$programme)
                                                        <tr>
                                                            <td>{{ $index+1 }}</td>
                                                            <td>{{ $programme->name }}</td>
                                                            <td>{{ $programme->collage->name }}</td>
                                                            <td>{{ $programme->status == 1 ? 'Active' : 'Not active' }}</td>
                                                            <td><a href="/auth/programmes/{{$programme->id}}" class="btn btn-warning">Edit</a></td>
                                                            <td><a href="/auth/programmes/delete/{{$programme->id}}" onclick="return confirm('Are you sure you want to delete this programmes?')" class="btn btn-danger">Delete</a></td>
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