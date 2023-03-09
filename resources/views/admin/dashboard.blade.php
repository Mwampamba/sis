@include('admin.includes.header')
<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper"> 
    @include('admin.includes.navbar') 
    @include('admin.includes.sidebar') 
    <div class="content-wrapper"> 
        @can('isAdmin')
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h5 class="m-0">Dashboard</h5>
                    </div> 
                </div> 
            </div> 
            </div> 
            <section class="content">
            <div class="row">
                <div class="col-12 col-sm-6 col-md-3">
                  <div class="info-box">
                    <span class="info-box-icon bg-info elevation-1"><i class="fas fa-copy"></i></span>
                    <div class="info-box-content">
                      <span class="info-box-text"><a href="{{ route('courses')}}">Courses</a></span>
                      <span class="info-box-number">
                        {{ $courses }}
                      </span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-12 col-sm-6 col-md-3">
                  <div class="info-box mb-3">
                    <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-building"></i></span>
      
                    <div class="info-box-content">
                      <span class="info-box-text"><a href="{{ route('classes')}}">Classes</a></span>
                      <span class="info-box-number">{{ $classes}}</span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
                </div>
                <!-- /.col -->
      
                <!-- fix for small devices only -->
                <div class="clearfix hidden-md-up"></div>
      
                <div class="col-12 col-sm-6 col-md-3">
                  <div class="info-box mb-3">
                    <span class="info-box-icon bg-success elevation-1"><i class="fas fa-users"></i></span>
      
                    <div class="info-box-content">
                      <span class="info-box-text"><a href="{{ route('staffs')}}">Staffs</a></span>
                      <span class="info-box-number">{{ $lecturers }}</span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-12 col-sm-6 col-md-3">
                  <div class="info-box mb-3">
                    <span class="info-box-icon bg-warning elevation-1"><i class="nav-icon fa fa-user-graduate"></i></span>
      
                    <div class="info-box-content">
                      <span class="info-box-text"><a href="{{ route('students') }}"> Students</a></span>
                      <span class="info-box-number">{{ $students }}</span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
                </div>
                <!-- /.col -->
              </div>
            </section>
        @endcan

        @if(Auth::user()->role == 0)
            <div class="card-header">
                <h4 class="m-0">Welcome, {{ Auth::user()->name}}</h4>
            </div> 

        @endif
    </div>
   
    @include('admin.includes.footer')