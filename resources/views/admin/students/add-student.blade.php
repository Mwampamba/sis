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
                                        <h3>Register new student
                                            <a href="{{ route('students')}}" class="btn btn-danger float-right">BACK</a> 
                                        </h3>
                                    </div>
                                    <div class="card-body">
                                        <form action="{{ route('saveStudent')}}" method="POST" enctype="multipart/form-data">
                                            @csrf 
                                            <div class="row">
                                                <div class="col-md-12 mb-3">
                                                    <label for="">Student name<span class="text-danger">*</span></label>
                                                    <input type="text" name="name" class="form-control" placeholder="Student name" />
                                                    @error('name')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="col-md-12 mb-3">
                                                    <label for="">Email address<span class="text-danger">*</span></label>
                                                    <input type="email" name="email" class="form-control" placeholder="Email address" />
                                                    @error('email')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label for="">Mobile phone<span class="text-danger">*</span></label>
                                                    <input type="text" name="phone" class="form-control" placeholder="Mobile phone" />
                                                    @error('phone')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <div class="col-md-6 mb-3">
                                                    <label for="">Registration number<span class="text-danger">*</span></label>
                                                    <input type="text" name="reg_number" class="form-control" placeholder="Registration number" />
                                                    @error('reg_number')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div> 
                                                <div class="col-md-6 mb-3">
                                                    <label for="">Programme of study<span class="text-danger">*</span></label>
                                                    <select name="programme" class="form-control selector">
                                                        <option value="">Select programme name</option>
                                                        @foreach ($programmes as $programme)
                                                            <option value="{{ $programme->id }}">{{ $programme->name }}</option>
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
                                                        @foreach ($collages as $collage)
                                                            <option value="{{ $collage->id }}">{{ $collage->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('collage')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="col-md-7 mb-3">
                                                    <label for="">Class name<span class="text-danger">*</span></label>
                                                    <select name="class" class="form-control selector">
                                                        <option value="">Select class name</option>
                                                        @foreach ($classes as $class)
                                                            <option value="{{ $class->id }}">{{ $class->name }} :: {{ $class->programme->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('class')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="col-md-5 mb-3">
                                                    <label for="">Profile picture</label>
                                                    <input type="file" name="picture" class="form-control" onchange="previewFile(this)" />
                                                    <img id="previewImg" style="max-width:130px;margin-top:10px;" />
                                                    @error('profile')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div> 
                                                <div class="col-md-12 mb-3">
                                                    <button type="submit" class="btn btn-primary">Register student</button>
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
