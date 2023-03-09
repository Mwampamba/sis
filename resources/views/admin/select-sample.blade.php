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
                <h3 class="m-0">Examinations</h3>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('studentDashboard')}}">Home</a></li>
                <li class="breadcrumb-item active">Examinations</li>
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
                                        <form action="#" method="post">       
                                            <div class="row">
                                                <div class="col-md-10">
                                                    <fieldset>
                                                        <div class="row">
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label for="">Academic year</label>
                                                                    <select id="year" name="year" class="form-control years" required>
                                                                        <option value="" selected>Select academic year</option>
                                                                        @if(!@empty($years))
                                                                            @foreach ($years as $year)
                                                                                <option value="{{ $year->id }}">{{ $year->name }}</option>
                                                                            @endforeach
                                                                        @endif
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label for="">Examination</label>
                                                                    <select id="exam" name="exam" class="form-control exams" required>
                                                                        <option value="" selected>Select examination</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-5">
                                                                <div class="form-group">
                                                                    <label for="">Class</label>
                                                                    <select id="class" name="class" class="form-control classes">
                                                                        <option value="" selected>Select class</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </fieldset>
                                                </div>
                                                <div class="col-md-2 mt-3">
                                                    <div class="text-right mt-1">
                                                        <button type="submit" class="btn btn-primary">Manage Marks</button>
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