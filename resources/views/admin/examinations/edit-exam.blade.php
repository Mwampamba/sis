@include('admin.includes.header')

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper"> 
    @include('admin.includes.navbar') 

    @include('admin.includes.sidebar') 
    <div class="content-wrapper"> 
        <div class="content-header">
        </div> 
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3>Update examination
                                            <a href="{{ route('examinations')}}" class="btn btn-danger float-right">BACK</a> 
                                        </h3>
                                    </div>
                                    <div class="card-body">
                                        <form action="{{ route('updateExamination', $exam->id)}}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="row">
                                                <div class="col-md-6 mb-3">
                                                    <label>Examination name<span class="text-danger">*</span></label>
                                                    <input type="text" name="exam_name" class="form-control" value="{{ $exam->exam_name }}" placeholder="Examination name" />
                                                    @error('exam_name')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label>Examination type<span class="text-danger">*</span></label>
                                                    <select name="exam_type" class="form-control selector">
                                                        <option value="">Select examination type</option>
                                                        @foreach($exam_types as $exam_type)
                                                            <option value="{{$exam_type->id}}"{{ $exam_type->id == $exam->exam_type_id ? 'selected' : '' }}>{{ $exam_type->exam_type }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('exam_type')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <div class="col-md-6 mb-3">
                                                    <label>Semester name<span class="text-danger">*</span></label>
                                                    <select name="semester" class="form-control selector">
                                                        <option value="">Select semester name</option>
                                                        @foreach($semesters as $exam_semester)
                                                            <option value="{{$exam_semester->id}}"{{ $exam_semester->id == $exam->semester_id ? 'selected' : '' }}>{{ $exam_semester->name }} -- {{ $exam_semester->academic_year->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('semester')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label>Academic year name<span class="text-danger">*</span></label>
                                                    <select name="year" class="form-control years">
                                                        <option value="">Select academic year</option>
                                                        @foreach($years as $exam_year)
                                                            <option value="{{ $exam_year->id}}"{{ $exam_year->id == $exam->academic_year_id ? 'selected' : '' }}>{{ $exam_year->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('year')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                               <div class="col-md-4 mb-3">
                                                <label>Status<span class="text-danger">*</span></label>
                                                    <select name="status" class="form-control selector">
                                                        <option value="">Select status</option>
                                                        <option value="1"{{ $exam->status == '1' ? 'selected': '' }}> Active</option>
                                                        <option value="0"{{ $exam->status == '0' ? 'selected': '' }}> Not active</option>
                                                    </select>
                                                    @error('status')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="col-md-8 mb-3">
                                                    <label>Select classes<span class="text-danger">*</span></label><br>
                                                        @foreach($classes as $class)
                                                            <input type="checkbox" name="classes[{{$class->id}}]" value="{{ $class->id }}" /> {{ $class->name }} -- {{ $class->programme->name }}<br>
                                                        @endforeach
                                                        @error('classes')
                                                            <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                               </div>
                                                <div class="col-md-12 mb-3">
                                                    <button type="submit" class="btn btn-primary">Update examination</button>
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