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
                                        <h3>Add class 
                                            <a href="{{ route('classes')}}" class="btn btn-danger float-right">BACK</a> 
                                        </h3>
                                    </div>
                                    <div class="card-body">
                                        <form action="{{ route('saveClass')}}" method="POST">
                                            @csrf
                                            <div class="row">
                                                <div class="col-md-6 mb-3">
                                                    <label for="">Class name<span class="text-danger">*</span></label>
                                                    <input type="text" name="name" class="form-control" placeholder="Class name (i.e First year)" />
                                                    @error('name')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label for="">Programme of study<span class="text-danger">*</span></label>
                                                    <select name="programme" class="form-control selector">
                                                        <option value="">Select programme name</option>
                                                        @foreach($programmes as $programme)
                                                            <option value="{{ $programme->id}}">{{ $programme->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('programme')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <div class="col-md-6 mb-3">
                                                    <label for="">Collage name<span class="text-danger">*</span></label>
                                                    <select name="collage" class="form-control selector">
                                                        <option value="">Select collage name</option>
                                                        @foreach($collages as $collage)
                                                            <option value="{{ $collage->id}}">{{ $collage->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('collage')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label for="">Academic year name<span class="text-danger">*</span></label>
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
        </section>
    </div> 
    @include('admin.includes.footer')