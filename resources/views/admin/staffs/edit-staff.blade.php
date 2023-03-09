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
                                        <h3>Update staff
                                            <a href="{{ route('staffs')}}" class="btn btn-danger float-right">BACK</a> 
                                        </h3>
                                    </div>
                                    <div class="card-body">
                                        <form action="{{ url('/auth/staffs/'.$staff->id)}}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="row">
                                                <div class="col-md-12 mb-3">
                                                    <label for="">Staff name<span class="text-danger">*</span></label>
                                                    <input type="text" name="name" class="form-control" value="{{ $staff->name }}" placeholder="Enter lecturer name" />
                                                    @error('name')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="col-md-12 mb-3">
                                                    <label for="">Email address<span class="text-danger">*</span></label>
                                                    <input type="email" name="email" class="form-control" value="{{ $staff->email }}" placeholder="Enter email address" />
                                                    @error('email')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="col-md-12 mb-3">
                                                    <label for="">Department<span class="text-danger">*</span></label>
                                                    <select name="department" class="form-control selector">
                                                        <option value="">Select department</option>
                                                        @foreach($departments as $department)
                                                            <option value="{{ $department->id }}" {{ $department->id == $staff->department_id ? 'selected' : '' }}>{{ $department->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('department')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <div class="col-md-6 mb-3">
                                                    <label for="">Staff ID<span class="text-danger">*</span></label>
                                                    <input type="text" name="staffID" class="form-control" value="{{ $staff->staff_id }}" placeholder="Enter staff ID" />
                                                    @error('staffID')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label for="">Mobile phone<span class="text-danger">*</span></label>
                                                    <input type="number" name="phone" class="form-control" value="{{ $staff->phone }}" placeholder="Enter mobile phone number" />
                                                    @error('phone')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label for="">Profile picture</label>
                                                    <input type="file" name="picture" class="form-control" onchange="previewFile(this)" />
                                                    <img src="{{asset($staff->picture)}}" alt="Profile" style="width:150px;height:120px" id="previewImg" />
                                                    @error('profile')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div> 
                                                <div class="col-md-6 mb-3">
                                                    <label for="">Role<span class="text-danger">*</span></label>
                                                    <select name="role" class="form-control selector">
                                                        <option value="">Select staff role</option>
                                                        <option value="1" {{ $staff->role == '1' ? 'selected': '' }}>Admin</option>
                                                        <option value="0" {{ $staff->role == '0' ? 'selected': '' }}>Lecturer</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-12 mb-3">
                                                    <button type="submit" class="btn btn-primary">Update staff</button>
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