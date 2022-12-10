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
                <h1 class="m-0">Lecturers</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('dashboard')}}">Home</a></li>
                <li class="breadcrumb-item active">Update lecturer</li>
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
                                        <h4>Update lecturer
                                            <a href="{{ route('staffs')}}" class="btn btn-danger float-right">BACK</a> 
                                        </h4>
                                    </div>
                                    <div class="card-body">
                                        <form action="{{ url('/auth/staffs/'.$staff->id)}}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="row">
                                                <div class="col-md-5 mb-3">
                                                    <label for="">Name</label>
                                                    <input type="text" name="name" class="form-control" value="{{ $staff->name }}" placeholder="Enter lecturer name" />
                                                    @error('name')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="col-md-5 mb-3">
                                                    <label for="">Email address</label>
                                                    <input type="email" name="email" class="form-control" value="{{ $staff->email }}" placeholder="Enter email address" />
                                                    @error('email')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <div class="col-md-5 mb-3">
                                                    <label for="">Staff ID</label>
                                                    <input type="text" name="staffID" class="form-control" value="{{ $staff->staff_id }}" placeholder="Enter staff ID" />
                                                    @error('staffID')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="col-md-5 mb-3">
                                                    <label for="">Mobile phone</label>
                                                    <input type="number" name="phone" class="form-control" value="{{ $staff->phone }}" placeholder="Enter mobile phone number" />
                                                    @error('phone')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <div class="col-md-5 mb-3">
                                                    <label for="">Department</label>
                                                    <select name="department" class="form-control department">
                                                        <option value="">Please, select department</option>
                                                        @foreach($departments as $department)
                                                            <option value="{{ $department->id }}" {{ $department->id == $staff->department_id ? 'selected' : '' }}>{{ $department->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('department')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <div class="col-md-5 mb-3">
                                                    <label for="">Role</label>
                                                    <select name="role" class="form-control">
                                                        <option value="">Select role</option>
                                                        <option value="1" {{ $staff->role == '1' ? 'selected': '' }}>Admin</option>
                                                        <option value="0" {{ $staff->role == '0' ? 'selected': '' }}>Lecturer</option>
                                                    </select>
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