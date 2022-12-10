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
                <li class="breadcrumb-item"><a href="{{ route('dashboard')}}">Home</a></li>
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
                                    <div class="card-header">
                                        <h4>
                                            <a href="{{ route('examinations')}}" class="btn btn-danger float-right">BACK</a> 
                                        </h4>
                                    </div>
                                    <div class="card-body">
                                        <form action="{{ route('saveExamination')}}" method="POST">
                                            @csrf
                                            <div class="row">
                                                <div class="col-md-6 mb-3">
                                                    <label for="">Examination name</label>
                                                    <input type="text" name="name" class="form-control" placeholder="Examination name" />
                                                    @error('name')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label for="">Examination type</label>
                                                    <select name="exam_type" class="form-control">
                                                        <option value="">Select examination type</option>
                                                        @foreach($exam_types as $exam)
                                                            <option value="{{ $exam->id}}">{{ $exam->exam_type }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('exam_type')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <div class="col-md-6 mb-3">
                                                    <label for="">Semester</label>
                                                    <select name="semester" class="form-control">
                                                        <option value="">Select semester</option>
                                                        @foreach($semesters as $semester)
                                                            <option value="{{ $semester->id}}">{{ $semester->name }} -- {{ $semester->academic_year->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('semester')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label for="">Academic year</label>
                                                    <select name="year" class="form-control">
                                                        <option value="">Select academic year</option>
                                                        @foreach($years as $year)
                                                            <option value="{{ $year->id}}">{{ $year->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('year')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label for="">Starting date</label>
                                                    <input type="date" name="starting_date" class="form-control" />
                                                    @error('starting_date')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label for="">Ending date</label>
                                                    <input type="date" name="ending_date" class="form-control" />
                                                    @error('ending_date')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                               <div class="col-md-4 mb-3">
                                                <label for="">Examination status</label>
                                                    <select name="status" class="form-control">
                                                        <option value="">Select status</option>
                                                        <option value="1">Active</option>
                                                        <option value="0">Not active</option>
                                                    </select>
                                                    @error('status')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="col-md-8 mb-3">
                                                    <label for="">Select classes</label><br>
                                                        @foreach($classes as $class)
                                                            <input type="checkbox" name="classes[{{$class->id}}]" value="{{ $class->id }}" /> {{ $class->name }} -- {{ $class->programme->name }}<br>
                                                        @endforeach
                                                        @error('classes')
                                                            <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                               </div>
                                                <div class="col-md-12 mb-3">
                                                    <label for="">Description</label>
                                                    <textarea name="description" class="form-control" rows="5"></textarea>
                                                </div>
                                                <div class="col-md-12 mb-3">
                                                    <button type="submit" class="btn btn-primary">Save</button>
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