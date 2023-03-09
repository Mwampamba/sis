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
                                        <h4>Upload student(s) data
                                            <a href="{{ route('students')}}" class="btn btn-danger float-right">BACK</a> 
                                        </h4>
                                    </div>
                                    <div class="card-body">
                                        <form action="{{ route('bulkSaveStudents')}}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="row">
                                                <div class="form-row">
                                                    <div class="col-md-9 mb-3">
                                                        <a href="{{ asset('files/students.csv')}}" class="btn btn-success float-right"><i class="fa fa-download"></i> DOWNLOAD EXCEL SAMPLE</a>
                                                    </div> 
                                                    <div class="col-md-6 mb-3">
                                                        <input type="file" class="file form-control " name="file" required />
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <button type="submit" class="btn btn-primary"><i class="fas fa-upload"></i>
                                                            <span>UPLOAD STUDENT(s) DATA</span>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                        {{-- <section class="progress-area">
                                            <li class="row">
                                                <i class="fas fa-file-alt"> </i>
                                                <div class="content">
                                                    <div class="details">
                                                        <span class="name"> Progression bar . Uploading</span>
                                                        <span class="percent">50%</span>
                                                    </div>
                                                </div>
                                                <div class="progress-bar">
                                                    <div class="progress"></div>
                                                </div>
                                            </li>
                                        </section>
                                        <section class="uploaded-area">
                                            <li class="row">
                                                <div class="content">
                                                <i class="fas fa-file-alt"> </i>
                                                    <div class="details">
                                                        <span class="name"> File name. Uploaded</span>
                                                        <span class="size">100 KB</span>
                                                    </div>
                                                </div>
                                                <i class="fas fa-check"></i>
                                            </li>
                                        </section> --}}
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