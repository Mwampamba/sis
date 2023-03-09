@include('admin.includes.header')

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper"> 
    @include('admin.includes.student.navbar') 

    @include('admin.includes.student.sidebar') 
  <div class="content-wrapper"> 

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">
            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                @if($student->profile)
                <div class="text-center">
               <a href=""><img src="{{ asset($student->profile) }}" class="img-rounded border elevation-2" style="width:200px;height:190px" alt="Student profile"></a>   
                </div>
                @else
                <div class="text-center">
                  <img src="{{ asset('profile/student/default-profile.jpg') }}" class="img-rounded border elevation-2" style="width:200px;height:190px" alt="Student profile">
                </div>
                @endif

                <p class="profile-username text-center">  
                  @if(Auth::guard('student')->check())
                   {{ Auth::guard('student')->user()->name }} 
                  @endif
                </p> 
                
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <h2>Update your password</h2>
              </div>
              <div class="card-body">
                <form action="{{ url('/student/profile/'.auth()->guard('student')->id()) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group row">
                      <label for="">Email address</label>
                        <div class="col-sm-10">
                            <input type="email" name="email" class="form-control" value="
                            @if(Auth::guard('student')->check())
                            {{ Auth::guard('student')->user()->email }}
                        @endif" readonly />
                                @error('email')
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
                        <div class="col-sm-9">
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