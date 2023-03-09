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
                                        <h3>New examination
                                            <a href="{{ route('examinations')}}" class="btn btn-danger float-right">BACK</a> 
                                        </h3>
                                    </div>
                                    <div class="card-body">
                                        <form action="{{ route('saveExamination')}}" method="POST">
                                            @csrf
                                            <div class="row">
                                                <div class="col-md-6 mb-3">
                                                    <label>Examination name<span class="text-danger">*</span></label>
                                                    <input type="text" name="exam_name" class="form-control" placeholder="Examination name" />
                                                    @error('exam_name')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label>Examination type<span class="text-danger">*</span></label>
                                                    <select name="exam_type" class="form-control selector">
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
                                                    <label>Semester name<span class="text-danger">*</span></label>
                                                    <select name="semester" class="form-control selector">
                                                        <option value="">Select semester</option>
                                                        @foreach($semesters as $semester)
                                                            <option value="{{ $semester->id}}">{{ $semester->name }} :: {{ $semester->academic_year->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('semester')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label>Academic year name<span class="text-danger">*</span></label>
                                                    <select name="year" class="form-control selector">
                                                        <option value="">Select academic year</option>
                                                        @foreach($years as $year)
                                                            <option value="{{ $year->id}}">{{ $year->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('year')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                               <div class="col-md-4 mb-3">
                                                <label>Examination status<span class="text-danger">*</span></label>
                                                    <select name="status" class="form-control selector">
                                                        <option value="">Select status</option>
                                                        <option value="1">Not marked</option>
                                                        <option value="0">Marked</option>
                                                    </select>
                                                    @error('status')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="col-md-8 mb-3">
                                                    <label>Select classes<span class="text-danger">*</span></label><br>
                                                        @foreach($classes as $class)
                                                            <input type="checkbox" name="classes[{{$class->id}}]" value="{{ $class->id }}" /> {{ $class->name }} :: {{ $class->programme->name }}<br>
                                                        @endforeach
                                                        @error('classes')
                                                            <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                               </div>
                                                <div class="col-md-12 mb-3">
                                                    <label>Description</label>
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