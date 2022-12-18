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
                <h3 class="m-0">Classes</h3>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                <li class="breadcrumb-item active">Classes</li>
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
                                    @if(auth()->user()->role == '1')
                                    <div class="card-header">
                                        <a href="#" class="btn btn-primary float-left">Bulk import classes</a> 
                                            <a href="{{route('addClass')}}" class="btn btn-success float-right">Add class</a> 
                                    </div>
                                    @endif
                                        <div class="card-body">
                                            <div class="card">
                                            <table id="myDataTable" class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Class</th> 
                                                        <th>Programme of study</th>  
                                                        <th>Academic year</th>                                 
                                                        @if(auth()->user()->role == '1')
                                                        <th>View</th>
                                                        <th>Edit</th>
                                                        <th>Delete</th>
                                                        @endif
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($classes as $index=>$class)
                                                        <tr>
                                                            <td>{{ $index+1 }}</td>
                                                            <td>{{ $class->name }}</td>
                                                            <td>{{ $class->programme->name }}</td>
                                                            <td>{{ $class->academic_year->name }}</td>
                                                            @if(auth()->user()->role == '1')
                                                            <td><a href="/auth/classes/view/{{$class->id}}" class="btn btn-secondary">View</a></td>
                                                            <td><a href="/auth/classes/{{$class->id}}" class="btn btn-warning">Edit</a></td>
                                                            <td><a href="/auth/classes/delete/{{$class->id}}" onclick="return confirm('Are you sure you want to delete this class?')" class="btn btn-danger">Delete</a></td>
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