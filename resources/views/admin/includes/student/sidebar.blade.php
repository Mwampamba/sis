@php
  $current_route = request()->route()->getName();
@endphp
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('studentDashboard')}}" class="brand-link"> 
      <span class="brand-text font-weight-light">Student Infomation System</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
              <li class="nav-item">
                <a href="{{route('studentDashboard')}}" class="nav-link {{ $current_route == 'dashboard'?'active':''}}">
                    <i class="nav-icon fas fa-th"></i>
                    <p>
                        Dashboard
                    </p>
                </a>
              </li> 
 
              <li class="nav-header">COURSES</li>
                <li class="nav-item {{ $current_route == 'courses'?'menu-open':''}}">
                      <a href="" class="nav-link {{ $current_route == 'courses'?'active':''}}">
                  <i class="nav-icon  fa fa-copy"></i>
                    <p>
                        Courses
                      <i class="right fas fa-angle-left"></i>
                    </p>
                    </a>
                <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link {{ $current_route == 'lecturerCourses'?'active':''}}">
                  <i class="nav-icon fa fa-bars"></i>
                  <p>View courses</p>
                </a>
              </li>
            </ul>
          </li>
              <li class="nav-header">RESULTS</li>
              <li class="nav-item {{ $current_route == 'transcripts'?'menu-open':''}}">
                  <a href="#" class="nav-link {{ $current_route == 'transcripts'?'active':''}}">
                  <i class="nav-icon fas fa-copy"></i>
                  <p>
                    Examination results
                    <i class="right fas fa-angle-left"></i>
                  </p>
                  </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="#" class="nav-link {{ $current_route == 'transcripts'?'active':''}}">
                    <i class="nav-icon fas fa-server"></i>
                    <p>View exam results</p>
                  </a>
                </li>
              </ul>

              <li class="nav-header">NOTES</li>
              <li class="nav-item {{ $current_route == 'transcripts'?'menu-open':''}}">
                  <a href="#" class="nav-link {{ $current_route == 'transcripts'?'active':''}}">
                  <i class="nav-icon fas fa-copy"></i>
                  <p>
                    Class notes
                    <i class="right fas fa-angle-left"></i>
                  </p>
                  </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="#" class="nav-link {{ $current_route == 'transcripts'?'active':''}}">
                    <i class="nav-icon fas fa-server"></i>
                    <p>View class notes</p>
                  </a>
                </li>
              </ul>

              <li class="nav-header">EVALUATION</li>
              <li class="nav-item {{ $current_route == 'transcripts'?'menu-open':''}}">
                  <a href="#" class="nav-link {{ $current_route == 'transcripts'?'active':''}}">
                  <i class="nav-icon fas fa-copy"></i>
                  <p>
                    Lecturer evaluation
                    <i class="right fas fa-angle-left"></i>
                  </p>
                  </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="#" class="nav-link {{ $current_route == 'transcripts'?'active':''}}">
                    <i class="nav-icon fas fa-server"></i>
                    <p>Manage evaluation</p>
                  </a>
                </li>
              </ul>
           
           

          </ul>
   
  </nav>
  </div>
</aside>
