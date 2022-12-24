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
                <h3 class="m-0">Student transcript</h3>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('dashboard')}}">Home</a></li>
                <li class="breadcrumb-item active">Transcript</li>
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
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr> 
                                                    <th>Student name</th>  
                                                    <th>Registration number</th>
                                                    <th>Programme of study</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($student_details as $student)
                                                    <tr>
                                                        <td>{{ $student->name }}</td>
                                                        <td>{{ $student->reg_number }}</td> 
                                                        <td>{{ $student->program}}</td> 
                                                    </tr>
                                                @endforeach
                                           </tbody>
                                       </table>
                                    </div>
                                        <div class="card-body">
                                            <table id="myDataTable" class="table table-bordered">
                                                <thead>
                                                    <tr> 
                                                        <th>#</th>  
                                                        <th>Course title</th>
                                                        <th>Code</th> 
                                                        <th>Type</th> 
                                                        <th>Score</th> 
                                                        <th>Grade</th>
                                                        <th>Credit</th>  
                                                        <th>Point</th> 
                                                        <th>Semester</th> 
                                                        <th>Academic year</th>  
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                     @foreach($transcript_details as $index=>$course)
                                                        <tr>
                                                            <td>{{ $index+1 }}</td> 
                                                            <td>{{ $course->title }}</td>
                                                            <td>{{ $course->code }}</td> 
                                                            <td>{{ $course->status != 0 ? 'Core' : 'Optional'}}</td>
                                                            <td>{{ $course->score }}</td> 
                                                            <td>{{ $course->grade }}</td> 
                                                            <td>{{ $course->credit }}</td> 
                                                            <td>{{ $course->point }}</td>
                                                            <td>{{ $course->semester }}</td> 
                                                            <td>{{ $course->academic_year }}</td>
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