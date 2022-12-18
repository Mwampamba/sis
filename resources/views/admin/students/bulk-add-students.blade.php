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
                                    <div class="card-header">
                                        <h4>Bulk import students
                                            <a href="{{ route('students')}}" class="btn btn-danger float-right">BACK</a> 
                                        </h4>
                                    </div>
                                    <div class="card-body">
                                        <form action="{{ route('bulkSaveStudents')}}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="row">
                                                <div class="form-row">
                                                    <div class="col-md-9 mb-3">
                                                        <a href="{{ asset('files/students.xlsx')}}" class="btn btn-success float-right"><i class="fa fa-download"></i> DOWNLOAD EXCEL SAMPLE</a>
                                                    </div> 
                                                    <div class="col-md-6 mb-3">
                                                        <input type="file" class="form-control " name="file" required />
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <button type="submit" class="btn btn-primary"><i class="fas fa-upload"></i>
                                                             <span>Upload/ Bulk import student(s)</span>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
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