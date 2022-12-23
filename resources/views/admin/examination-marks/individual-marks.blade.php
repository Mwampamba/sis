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
                <h3 class="m-0">Student marks</h3>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('dashboard')}}">Home</a></li>
                <li class="breadcrumb-item active">Student marks</li>
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
                                            {{-- <h2>{{ $students_scores->reg_number }}</h2>  --}}
                                    </div>
                                        <div class="card-body">
                                                @if(Session::has('success'))
                                                    <div class="alert alert-success" role="alert">{{ Session::get('success') }}</div>
                                                @endif
                                                @if(Session::has('delete'))
                                                    <div class="alert alert-danger" role="alert">{{ Session::get('delete') }}</div>
                                                @endif
                                            
                                        </div>
                                        <div class="card">
                                            <table id="myDataTable" class="table table-bordered">
                                                <thead>
                                                    <tr> 
                                                        <th>Course</th>  
                                                        <th>Credit</th> 
                                                        <th>Score</th> 
                                                        <th>Grade</th> 
                                                        <th>Point</th>                                 
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                     @foreach($class_courses as $index=>$course)
                                                        <tr>
                                                            <td>{{ $course->title }}</td> 
                                                            <td>Credit</td> 
                                                            <td>{{ $course->score }}</td> 
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