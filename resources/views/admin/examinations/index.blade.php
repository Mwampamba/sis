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
                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
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
                                    @can('isAdmin')
                                        <div class="card-header">
                                            <a href="#" class="btn btn-primary float-left">Bulk import examinations</a> 
                                                <a href="{{ route('addExamination') }}" class="btn btn-success float-right">Add examination</a> 
                                        </div>
                                    @endcan
                                        <div class="card-body">
                                            <div class="card">
                                            <table id="myDataTable" class="table table-bordered">
                                                <thead>
                                                    <tr> 
                                                        <th>#</th>
                                                        <th>Examination name</th>
                                                        <th>Exam type</th>
                                                        <th>Semester</th>
                                                        <th>Academic year</th> 
                                                        {{-- <th>Marking status</th>                                      --}}
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($exams as $index=>$exam)
                                                        <tr>
                                                            <td>{{ $index+1 }}</td>
                                                            <td>{{ $exam->exam_name }}</td>
                                                            <td>{{ $exam->exam_type->exam_type }}</td>
                                                            <td>{{ $exam->semester->name }}</td>
                                                            <td>{{ $exam->academic_year->name}}</td>
                                                            {{-- <td>{{ $exam->status == 1 ? 'Not marked' : 'Marked' }}</td> --}} 
                                                            <td><a href="/auth/examinations/classes-exam/{{$exam->id}}" class="btn btn-secondary">View | Add marks</a></td>
                                                            
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