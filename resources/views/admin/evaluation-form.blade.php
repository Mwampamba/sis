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
                <h3 class="m-0">Transcripts</h3>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('studentDashboard')}}">Home</a></li>
                <li class="breadcrumb-item active">Student transcript</li>
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
                                        <h4>
                                            <a href="{{ route('transcripts')}}" class="btn btn-danger float-right">BACK</a> 
                                        </h4>
                                    </div>
                                    <div class="card-body">
                                        <form action="#" method="post">       
                                            <div class="row">
                                                <div class="col-md-10">
                                                    <fieldset>
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label for="" class="col-form-label font-weight-bold">Examination</label>
                                                                    <select required id="exam_id" name="exam_id" data-placeholder="Select Examination" class="form-control courses">
                                                                        <option value="1">UE Final Exam - February, 2023</option>
                                                                        <option value="2">UE Final Exam - JULY, 2023</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                        
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label for="my_class_id" class="col-form-label font-weight-bold">Class:</label>
                                                                    <select required onchange="getClassSubjects(this.value)" id="my_class_id" name="my_class_id" data-placeholder="Select Exam First" class="form-control classes">
                                                                        <option value="">Select Class</option>
                                                                        <option  value="1">First year</option>
                                                                        <option  value="7">First year</option>
                                                                        <option  value="13">Fourth year</option>
                                                                        <option  value="2">Second year</option>
                                                                        <option  value="6">Second year</option>
                                                                        <option  value="11">Third year</option>
                                                                        <option  value="12">Third year</option>
                                                                </select>
                                                                </div>
                                                            </div>
                                        
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label for="subject_id" class="col-form-label font-weight-bold">Subject:</label>
                                                                    <select required id="subject_id" name="subject_id" data-placeholder="Select Class First" class="form-control courses">
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                        
                                                    </fieldset>
                                                </div>
                                        
                                                <div class="col-md-2 mt-4">
                                                    <div class="text-right mt-1">
                                                        <button type="submit" class="btn btn-primary">Manage Marks <i class="icon-paperplane ml-2"></i></button>
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