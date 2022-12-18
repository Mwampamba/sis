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
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Profile</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active">Profile</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                    <img src="{{asset('admin-assets/dist/img/logo.png')}}" class="img-circle elevation-2" alt="User Image">
                </div>

                <h5 class="profile-username text-center">{{ Auth::user()->name }}</h5>
                <p class="profile-username text-center">{{ Auth::user()->role != 0 ? 'Adminstrator' : 'Lecturer' }}</p>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <h2>Update profile</h2>
              </div>
              <div class="card-body">
                @if(Session::has('success'))
                    <div class="alert alert-success" role="alert">{{ Session::get('success') }}</div>
                @endif
                @if(Session::has('delete'))
                    <div class="alert alert-danger" role="alert">{{ Session::get('error') }}</div>
                @endif
                <form action="{{ url('http://127.0.0.1:8000/auth/profile/'.$staff->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group row">
                      <label for="">Email address</label>
                        <div class="col-sm-10">
                            <input type="email" name="email" class="form-control" value="{{ Auth::user()->email }}" readonly />
                                @error('email')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                        </div>
                    </div>
                        <div class="form-group row">
                        <label for="">Mobile phone</label>
                        <div class="col-sm-10">
                            <input type="text" name="phone" class="form-control" value="{{Auth::user()->phone }}" readonly />
                            @error('phone')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="">Old password</label>
                        <div class="col-sm-10">
                            <input type="password" name="old_password" class="form-control" placeholder="Old password"/>
                            @error('old_password')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                      </div>

                    <div class="form-group row">
                        <label for="">New password</label>
                        <div class="col-sm-10">
                          <input type="password" name="new_password" class="form-control" placeholder="New password"/>
                            @error('new_password')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                      </div>

                    <div class="form-group row">
                        <label for="">Confirm password</label>
                        <div class="col-sm-10">
                          <input type="password" name="confirm_password" class="form-control" placeholder="Confirm password"/>
                            @error('confirm_password')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                      </div>
                    <div class="form-group row">
                      <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary">Update</button>
                      </div>
                    </div>
                  </form>
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
   
    @include('admin.includes.footer')