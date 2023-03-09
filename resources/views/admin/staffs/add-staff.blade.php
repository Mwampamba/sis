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
                                        <h3>Register new staff
                                            <a href="{{ route('staffs')}}" class="btn btn-danger float-right">BACK</a> 
                                        </h3>
                                    </div>
                                    <div class="card-body">
                                        <form action="{{ route('saveStaff')}}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="row">
                                                <div class="col-md-12 mb-3">
                                                    <label>Staff name<span class="text-danger">*</label>
                                                    <input type="text" name="name" class="form-control" placeholder="Staff name" />
                                                    @error('name')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="col-md-12 mb-3">
                                                    <label>Email address<span class="text-danger">*</span></label>
                                                    <input type="email" name="email" class="form-control" placeholder="Email address" />
                                                    @error('email')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <div class="col-md-6 mb-3">
                                                    <label>Staff ID<span class="text-danger">*</span></label>
                                                    <input type="text" name="staff_id" class="form-control" placeholder="Staff ID" />
                                                    @error('staff_id')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label>Mobile phone<span class="text-danger">*</span></label>
                                                    <input type="number" name="phone" class="form-control" placeholder="Mobile phone" />
                                                    @error('phone')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="col-md-12 mb-3">
                                                    <label>Department name<span class="text-danger">*</span></label>
                                                    <select name="department" class="form-control selector">
                                                        <option value="">Select department</option>
                                                        @foreach ($departments as $department)
                                                            <option value="{{ $department->id }}">{{ $department->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('department')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label for="">Profile picture</label>
                                                    <input type="file" name="picture" class="form-control" onchange="previewFile(this)" />
                                                    <img id="previewImg" style="max-width:130px;margin-top:10px;" />
                                                    @error('profile')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div> 
                                                <div class="col-md-6 mb-3">
                                                    <label>Role<span class="text-danger">*</span></label>
                                                    <select name="role" class="form-control selector">
                                                        <option value="">Select staff role</option>
                                                        <option value="1">Admin</option>
                                                        <option value="0">Lecturer</option>
                                                    </select> 
                                                    @error('role')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="col-md-12 mb-3">
                                                    <button type="submit" class="btn btn-primary">Register staff</button>
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