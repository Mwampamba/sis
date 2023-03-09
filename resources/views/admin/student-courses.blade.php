@include('admin.includes.header')

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
    <!-- Navbar -->
    @include('admin.includes.student.navbar')

    <!-- Main Sidebar Container -->

    @include('admin.includes.student.sidebar')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h3 class="m-0">Courses</h3>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{route('studentDashboard')}}">Home</a></li>
                <li class="breadcrumb-item active">Courses</li>
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
                                        <div class="card-body">
                                            <div class="card">
                                            <table id="myDataTable" class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Course title</th> 
                                                        <th>Code</th>
                                                        <th>Type</th> 
                                                        <th>Credit</th> 
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($courses as $index=>$course)
                                                        <tr>
                                                            <td>{{ $index+1 }}</td>
                                                            <td>{{ $course->title }}</td>
                                                            <td>{{ $course->code }}</td>
                                                            <td>{{ $course->status == '1' ? 'Core' : 'Optional' }}</td>
                                                            <td>{{ $course->credit }}</td>
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