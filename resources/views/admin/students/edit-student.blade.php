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
                <h3 class="m-0">Students</h3>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('dashboard')}}">Home</a></li>
                <li class="breadcrumb-item active">Update student</li>
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
                                        <h4>Update student
                                            <a href="{{ route('students')}}" class="btn btn-danger float-right">BACK</a> 
                                        </h4>
                                    </div>
                                    <div class="card-body">
                                        <form action="{{ url('/auth/students/'.$student->id)}}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="row">
                                                <div class="col-md-6 mb-3">
                                                    <label for="">Name</label>
                                                    <input type="text" name="name" class="form-control" value="{{ $student->name }}" placeholder="Enter student name" />
                                                    @error('name')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label for="">Email address</label>
                                                    <input type="email" name="email" class="form-control" value="{{ $student->email }}" placeholder="Enter email address" />
                                                    @error('email')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="col-md-3 mb-3">
                                                    <label for="">Mobile phone</label>
                                                    <input type="text" name="phone" class="form-control" value="{{ $student->phone }}" placeholder="Enter mobile phone" />
                                                    @error('phone')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <div class="col-md-3 mb-3">
                                                    <label for="">Registration number</label>
                                                    <input type="text" name="reg_no" class="form-control" value="{{ $student->reg_number }}" placeholder="Enter registration number" />
                                                    @error('reg_no')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <div class="col-md-6 mb-3">
                                                    <label for="">Class</label>
                                                    <select name="class" class="form-control classes">
                                                        <option value="">Please, select class</option>
                                                        @foreach ($classes as $class)
                                                            <option value="{{ $class->id }}" {{ $class->id == $student->class_id ? 'selected' : '' }}>{{ $class->name }} -- {{$class->programme->name}}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('class')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div> 
                                                <div class="col-md-6 mb-3">
                                                    <label for="">Programme</label>
                                                    <select name="programme" class="form-control programme">
                                                        <option value="">Please, select programme</option>
                                                        @foreach ($programmes as $programme)
                                                            <option value="{{ $programme->id }}" {{ $programme->id == $student->programme_id ? 'selected' : ''}}>{{ $programme->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('programme')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <div class="col-md-6 mb-3">
                                                    <label for="">Collage</label>
                                                    <select name="collage" class="form-control collage">
                                                        <option value="">Please, select collage</option>
                                                        @foreach ($collages as $collage)
                                                            <option value="{{ $collage->id }}" {{ $collage->id == $student->collage_id ? 'selected' : ''}}>{{ $collage->name}}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('collage')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
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