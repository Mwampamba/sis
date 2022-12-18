<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SIS | Log in</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('admin-assets/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{ asset('admin-assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('admin-assets/dist/css/adminlte.min.css')}}">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href=""><b>Student Info's System</b></a>
  </div>
  {{-- <div class="login-logo">
    <div class="col mx-auto">
      <div class="mb-4 text-center">
        <img src="{{asset('admin-assets/dist/img/logo.png')}}" width="50%">
      </div>
    </div>
  </div> --}}
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body">
      @if(Session::has('success'))
        <div class="alert alert-success" role="alert">{{ Session::get('success') }}</div>
      @endif
      @if(Session::has('error'))
        <div class="alert alert-danger" role="alert">{{ Session::get('error') }}</div>
      @endif
      <p class="login-box-msg">Sign in to access your account</p>
      <form action="{{ route('postLogin')}}" method="post">
        @csrf
        <div class="input-group mb-2">
          <input type="email" name="email" class="form-control" placeholder="Enter your email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        @error('email')
            <div class="text-danger">{{ $message }}</div>
        @enderror
        <div class="input-group mb-2">
          <input type="password" name="password" class="form-control" placeholder="Enter your password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        @error('password')
            <div class="text-danger">{{ $message }}</div>
        @enderror
        <div class="row">
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <div class="col-6">
            <p class="mb-1">
              <a href="{{ route('studentGetLogin')}}">Student? login here</a>
            </p>
          </div>
          <!-- /.col -->
          <div class="col-6">
            <p class="mb-1">
              <a href="{{ route('getForgotPassword')}}">Forget password?</a>
            </p>
          </div>
          <!-- /.col -->
        </div>
      </form>    
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="{{ asset('admin-assets/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('admin-assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('admin-assets/dist/js/adminlte.min.js')}}"></script>
</body>
</html>
