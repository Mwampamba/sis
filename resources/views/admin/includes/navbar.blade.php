  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
    
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item dropdown user-menu">
        @if (Auth::user()->picture)
          <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
              <img src="{{ asset('profile/staff/'.Auth::user()->picture) }}" class="user-image img-circle elevation-2" style="width:40px;height:40px" alt="User Image">
          </a>
        @else
          <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
            <img src="{{ asset('admin-assets/dist/img/logo.png')}}" class="user-image img-circle elevation-2" alt="User Image">
          </a>
        @endif
        <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right rounded">
          <!-- User image -->
          <li class="user-header bg-primary">
            @if (Auth::user()->picture)
              <img src="{{ asset('profile/staff/'.Auth::user()->picture) }}" class="img-circle elevation-2" style="width:100px;height:100px" alt="User Image">
            @else  
              <img src="{{ asset('admin-assets/dist/img/logo.png')}}" class="user-image img-circle elevation-2" alt="User Image">
            @endif
            <p>
              {{Auth::user()->name}}
            </p>
          </li>
            <!-- /.row -->
          </li>
          <!-- Menu Footer-->
          <li class="user-footer">
            <a href="{{ url('/auth/profile/'.Auth::user()->id)}}" class="btn btn-primary btn-flat rounded">Profile</a>
            <a href="{{ route('staffLogout')}}" class="btn btn-danger btn-flat float-right rounded">Sign out</a>
          </li> 
        </ul>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      
    </ul>
</nav>