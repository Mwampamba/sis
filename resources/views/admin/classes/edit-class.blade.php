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
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3>Update class 
                                            <a href="{{ route('classes')}}" class="btn btn-danger float-right">BACK</a> 
                                        </h3>
                                    </div>
                                    <div class="card-body">
                                        <form action="{{ url('/auth/classes/'.$class->id)}}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="row">
                                                <div class="col-md-6 mb-3">
                                                    <label>Class name<span class="text-danger">*</span></label>
                                                    <input type="text" name="name" class="form-control " value="{{ $class->name }}" placeholder="Class name (i.e First year)" />
                                                    @error('name')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label>Programme name<span class="text-danger">*</span></label>
                                                    <select name="programme" class="form-control selector">
                                                        <option value="">Select programme name</option>
                                                        @foreach($programmes as $programme)
                                                            <option value="{{ $programme->id }}" {{ $programme->id == $class->programme_id ? 'selected' : '' }}>{{ $programme->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('programme')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label>Collage name<span class="text-danger">*</span></label>
                                                    <select name="collage" class="form-control selector">
                                                        <option value="">Select collage</option>
                                                        @foreach($collages as $collage)
                                                            <option value="{{ $collage->id }}" {{ $collage->id == $class->collage_id ? 'selected' : '' }}>{{ $collage->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('collage')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label>Academic year name<span class="text-danger">*</span></label>
                                                    <select name="year" class="form-control selector">
                                                        <option value="">Select academic year</option>
                                                        @foreach($years as $year)
                                                            <option value="{{ $year->id }}" {{ $year->id == $class->academic_year_id ? 'selected' : '' }}>{{ $year->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('year')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="col-md-12 mb-3">
                                                    <label>Description</label>
                                                    <textarea name="description" class="form-control" rows="5">{{ $class->description }}</textarea>
                                                </div>
                                                <div class="col-md-12 mb-3">
                                                    <button type="submit" class="btn btn-primary">Update</button>
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