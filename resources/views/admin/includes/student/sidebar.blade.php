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
                <a href="{{route('studentDashboard')}}" class="nav-link {{ $current_route == 'studentDashboard'?'active':''}}">
                    <i class="nav-icon fas fa-th"></i>
                    <p>
                        Dashboard
                    </p>
                </a>
              </li> 
              <li class="nav-item {{ $current_route == 'studentProvisionalResults'?'menu-open':''}}">
                  <a href="#" class="nav-link {{ $current_route == 'studentProvisionalResults'?'active':''}}">
                  <i class="nav-icon fas fa-copy"></i>
                  <p>
                    Profile
                    <i class="right fas fa-angle-left"></i>
                  </p>
                  </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ route('studentProvisionalResults')}}" class="nav-link {{ $current_route == 'studentProvisionalResults'?'active':''}}">
                    <i class="nav-icon fas fa-server"></i>
                    <p>View results</p>
                  </a>
                </li>
              </ul>
              <li class="nav-item {{ $current_route == ''?'menu-open':''}}">
                  <a href="#" class="nav-link {{ $current_route == ''?'active':''}}">
                  <i class="nav-icon fas fa-copy"></i>
                  <p>
                    Class notes
                    <i class="right fas fa-angle-left"></i>
                  </p>
                  </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="#" class="nav-link {{ $current_route == ''?'active':''}}">
                    <i class="nav-icon fas fa-server"></i>
                    <p>View class notes</p>
                  </a>
                </li>
              </ul>
              <li class="nav-item {{ $current_route == 'evaluations'?'menu-open':''}}">
                  <a href="#" class="nav-link {{ $current_route == 'evaluations'?'active':''}}">
                  <i class="nav-icon fas fa-copy"></i>
                  <p>
                    Course evaluation
                    <i class="right fas fa-angle-left"></i>
                  </p>
                  </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ route('evaluations')}}" class="nav-link {{ $current_route == 'evaluations'?'active':''}}">
                    <i class="nav-icon fas fa-server"></i>
                    <p>Course evaluation</p>
                  </a>
                </li>
              </ul>
          </ul>
  </nav>
  </div>
</aside>
