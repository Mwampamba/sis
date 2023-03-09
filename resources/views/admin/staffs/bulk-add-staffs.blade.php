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
                                        <h4>Upload staff(s) data 
                                            <a href="{{ route('staffs')}}" class="btn btn-danger float-right">BACK</a> 
                                        </h4>
                                    </div>
                                    <div class="card-body">
                                        <form action="{{ route('bulkSaveStaffs')}}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="row">
                                                <div class="form-row">
                                                    <div class="col-md-9 mb-3">
                                                        <a href="{{ asset('files/staffs.csv')}}" class="btn btn-success float-right"><i class="fa fa-download"></i> DOWNLOAD EXCEL SAMPLE</a>
                                                    </div> 
                                                    <div class="col-md-6 mb-3">
                                                        <input type="file" class="form-control " name="file" required />
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <button type="submit" class="btn btn-primary"><i class="fas fa-upload"></i>
                                                             <span>UPLOAD STAFF(s) DATA</span>
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