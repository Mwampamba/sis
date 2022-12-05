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
                <h3 class="m-0">Academic years</h3>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                <li class="breadcrumb-item active">Academic years</li>
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
                                            <a href="#" class="btn btn-primary float-left">Bulk import academic years</a> 
                                            <a href="{{ route('addAcademicYear')}}" class="btn btn-success float-right">Add academic year</a> 
                                    </div>
                                        <div class="card-body">
                                            <div class="card">
                                                @if(Session::has('success'))
                                                    <div class="alert alert-success" role="alert">{{ Session::get('success') }}</div>
                                                 @endif
                                            <table id="myDataTable" class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Academic year</th>   
                                                        <th>Description</th>  
                                                        <th>Status</th>                                      
                                                        <th>Edit</th>
                                                        <th>Delete</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($years as $index=>$year)
                                                        <tr>
                                                            <td>{{ $index+1 }}</td>
                                                            <td>{{ $year->name }}</td>
                                                            <td>{{ $year->description }}</td>
                                                            <td>{{ $year->status == '1' ? 'Active' : 'Not active' }}</td>
                                                            <td><a href="/auth/years/{{ $year->id }}" class="btn btn-warning">Edit</a></td>
                                                            <td><a href="/auth/years/delete/{{ $year->id }}" onclick="return confirm('Are you sure you want to delete this year?')" class="btn btn-danger">Delete</a></td>
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