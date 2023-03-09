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
                                        <h3>Update grade 
                                            <a href="{{ route('grades')}}" class="btn btn-danger float-right">BACK</a> 
                                        </h3>
                                    </div>
                                    <div class="card-body">
                                        <form action="{{ route('updateGrade',$grade->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="row">
                                                <div class="col-md-6 mb-3">
                                                    <label>Grade name<span class="text-danger">*</span></label>
                                                    <input type="text" name="name" class="form-control" value="{{ $grade->grade_name }}" placeholder="Grade name (i.e A, B+, B, C, etc..)" />
                                                    @error('name')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <div class="col-md-6 mb-3">
                                                    <label>Grade point<span class="text-danger">*</span></label>
                                                    <input type="number" name="point" class="form-control" value="{{ $grade->point }}" placeholder="Enter grade point (i.e 5, 4, 3, 2 etc..)" />
                                                    @error('point')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label>Marks from<span class="text-danger">*</span></label>
                                                    <input type="number" name="mark_from" class="form-control" value="{{ $grade->mark_from }}" placeholder="Enter grade marks from" />
                                                    @error('mark_from')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label>Marks up to<span class="text-danger">*</span></label>
                                                    <input type="number" name="mark_up_to" class="form-control" value="{{ $grade->mark_up_to }}" placeholder="Enter grade marks up to" />
                                                    @error('mark_up_to')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="col-md-12 mb-3">
                                                    <label>Remarks</label>
                                                    <textarea name="remarks" class="form-control" rows="5">{{ $grade->remarks }}</textarea>
                                                </div>
                                                <div class="col-md-12 mb-3">
                                                    <button type="submit" class="btn btn-primary">Update grade</button>
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