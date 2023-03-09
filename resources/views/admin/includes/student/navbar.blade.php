  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light ">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        
      <li class="nav-item dropdown user-menu rounded">
        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
          
          @if(Auth::guard('student')->user()->profile)
             <img src="{{asset(Auth::guard('student')->user()->profile)}}"  class="img-circle border elevation-2" style="width:40px;height:40px" alt="User Image">
             @else 
             <img src="{{asset('profile/student/default-profile.jpg')}}" class="user-image img-circle elevation-2" alt="User Image">
             @endif
        </a>
        <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right rounded">
          <!-- User image -->
          <li class="user-header bg-primary">
            @if(Auth::guard('student')->user()->profile)
             <img src="{{asset(Auth::guard('student')->user()->profile)}}"  class="img-circle border elevation-2" style="width:100px;height:100px" alt="User Image">
             @else
             <img src="{{asset('profile/student/default-profile.jpg')}}" class="user-image img-circle elevation-2" alt="User Image">
             @endif
            <p>
              @if(Auth::guard('student')->check())
                  {{ Auth::guard('student')->user()->name }}
              @endif
            </p> 
          </li>
            <!-- /.row -->
          </li>
          <!-- Menu Footer-->
          <li class="user-footer">
            <a href="{{ url('/student/profile/'.auth()->guard('student')->id()) }}" class="btn btn-primary btn-flat rounded">Profile</a>
            <a href="{{ route('studentLogout')}}" class="btn btn-danger btn-flat float-right rounded">Sign out</a>
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