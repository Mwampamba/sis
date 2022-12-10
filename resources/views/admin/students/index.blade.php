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
                <h3 class="m-0">Students</h3>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('dashboard')}}">Home</a></li>
                <li class="breadcrumb-item active">Students</li>
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
                                            <a href="#" class="btn btn-primary float-left">Bulk import students</a> 
                                            <a href="{{ route('addStudent')}}" class="btn btn-success float-right">Add student</a> 
                                    </div>
                                    @endif
                                        <div class="card-body">
                                            <div class="card">
                                                @if(Session::has('success'))
                                                    <div class="alert alert-success" role="alert">{{ Session::get('success') }}</div>
                                                @endif
                                                @if(Session::has('delete'))
                                                    <div class="alert alert-danger" role="alert">{{ Session::get('delete') }}</div>
                                                @endif
                                            <table id="myDataTable" class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Student name</th>    
                                                        <th>Class</th>
                                                        <th>Programme of study</th>                                         
                                                        @if(auth()->user()->role == '1')   
                                                        <th>Edit</th>
                                                        <th>Delete</th>
                                                        @endif
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($students as $index=>$student)
                                                        <tr>
                                                            <td>{{ $index+1 }}</td>
                                                            <td>{{ $student->name }}</td>
                                                            <td>{{ $student->class->name }}</td>
                                                            <td>{{ $student->programme->name }}</td>
                                                            @if(auth()->user()->role == '1')
                                                            <td><a href="/auth/students/{{$student->id}}" class="btn btn-warning">Edit</a></td>
                                                            <td><a href="/auth/students/delete/{{$student->id}}" onclick="return confirm('Are you sure you want to delete this lecturer?')" class="btn btn-danger">Delete</a></td>
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