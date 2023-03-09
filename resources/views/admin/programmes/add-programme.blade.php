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
                            <h3>Add new programme
                                <a href="{{ route('programmes')}}" class="btn btn-danger float-right">BACK</a> 
                            </h3>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('saveProgramme')}}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label>Programme name<span class="text-danger">*</span></label>
                                        <input type="text" name="name" class="form-control" placeholder="Programme name" />
                                        @error('name')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label>Collage name<span class="text-danger">*</span></label>
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
                                    <div class="col-md-12 mb-3">
                                        <label for="">Description</label>
                                        <textarea name="description" class="form-control" rows="5"></textarea>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <button type="submit" class="btn btn-primary">Save programme</button>
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