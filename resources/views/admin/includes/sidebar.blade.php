@php
  $current_route = request()->route()->getName();
@endphp
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('dashboard')}}" class="brand-link"> 
      <span class="brand-text font-weight-light">Student Infomation System</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
              <li class="nav-item">
                <a href="{{route('dashboard')}}" class="nav-link {{ $current_route == 'dashboard'?'active':''}}">
                    <i class="nav-icon fas fa-th"></i>
                    <p>
                        Dashboard
                    </p>
                </a>
              </li> 
            @can('isAdmin')
              <li class="nav-header">USERS</li>
                  <li class="nav-item {{ $current_route == 'staffs'?'menu-open':''}}">
                <a href="#" class="nav-link {{ $current_route == 'staffs'?'active':''}}">
                  <i class="nav-icon fas fa-users"></i>
                  <p>
                    Users
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{ route('students')}}" class="nav-link {{ $current_route == 'students'?'active':''}}">
                      <i class="nav-icon fa fa-user-graduate"></i>
                      <p>Manage students</p>
                    </a>
                  </li>
                </ul>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{ route('staffs')}}" class="nav-link {{ $current_route == 'staffs'?'active':''}}">
                      <i class="nav-icon fas fa-users"></i>
                      <p>Manage lecturers</p>
                    </a>
                  </li>
                </ul>
              </li>
           
              <li class="nav-header">CLASSES</li>
                  <li class="nav-item {{ $current_route == 'classes'?'menu-open':''}}">
                <a href="#" class="nav-link {{ $current_route == 'classes'?'active':''}}">
                  <i class="nav-icon fas fa-building"></i>
                  <p>
                    Classes
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{ route('classes')}}" class="nav-link {{ $current_route == 'classes'?'active':''}}">
                      <i class="nav-icon fas fa-building"></i>
                      <p>Manage classes</p>
                    </a>
                  </li>
                </ul>
              </li>
            @endcan
              <li class="nav-header">COURSES</li>
                <li class="nav-item {{ $current_route == 'courses'?'menu-open':''}}">
                      <a href="" class="nav-link {{ $current_route == 'courses'?'active':''}}">
                  <i class="nav-icon fas fa-file"></i>
                    <p>
                        Courses
                      <i class="right fas fa-angle-left"></i>
                    </p>
                    </a>
                <ul class="nav nav-treeview">
            @can('isAdmin')
              <li class="nav-item">
                <a href="{{ route('courses')}}" class="nav-link {{ $current_route == 'courses'?'active':''}}">
                  <i class="nav-icon fas fa-building"></i>
                  <p>Manage courses</p>
                </a>
              </li>
          
              <li class="nav-item">
                <a href="{{route('classCourses')}}" class="nav-link {{ $current_route == 'classCourses'?'active':''}}">
                  <i class="nav-icon fas fa-building"></i>
                  <p>Class courses</p>
                </a>
              </li>
            @endcan
              <li class="nav-item">
                <a href="{{ route('lecturerCourses')}}" class="nav-link {{ $current_route == 'lecturerCourses'?'active':''}}">
                  <i class="nav-icon fa fa-bars"></i>
                  <p>Lecturer courses</p>
                </a>
              </li>
            </ul>
          </li>
          @can('isAdmin')
            <li class="nav-header">EXAMINATIONS</li>
                  <li class="nav-item {{ $current_route == 'examTypes'?'menu-open':''}}">
                      <a href="#" class="nav-link {{ $current_route == 'examTypes'?'active':''}}">
                      <i class="nav-icon fas fa-server"></i>
                        <p>
                          Examinations
                          <i class="right fas fa-angle-left"></i>
                        </p>
                      </a>
                  <ul class="nav nav-treeview">
                      <li class="nav-item">
                        <a href="{{ route('examTypes')}}" class="nav-link {{ $current_route == 'examTypes'?'active':''}}">
                          <i class="nav-icon fas fa-server"></i>
                          <p>Examination types</p>
                        </a>
                      </li>
                    <li class="nav-item">
                      <a href="{{ route('examinations')}}" class="nav-link {{ $current_route == 'examinations'?'active':''}}">
                        <i class="nav-icon fas fa-server"></i>
                        <p>Manage examinations</p>
                      </a>
                    </li>
                  </ul>
                @endcan
            <li class="nav-header">MARKS</li>
              <li class="nav-item {{ $current_route == 'examinations'?'menu-open':''}}">
                  <a href="#" class="nav-link {{ $current_route == 'examinations'?'active':''}}">
                  <i class="nav-icon fas fa-server"></i>
                  <p>
              Marks
              <i class="right fas fa-angle-left"></i>
            </p>
            </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ route('examinations')}}" class="nav-link {{ $current_route == 'examinations'?'active':''}}">
                    <i class="nav-icon fas fa-server"></i>
                    <p>Manage marks</p>
                  </a>
                </li>
            </ul>
            @can('isAdmin')
              <li class="nav-header">REPORTS</li>
              <li class="nav-item {{ $current_route == 'results'?'menu-open':''}}">
                  <a href="#" class="nav-link {{ $current_route == 'results'?'active':''}}">
                  <i class="nav-icon fas fa-server"></i>
                  <p>
                    Reports/ Transcripts
                    <i class="right fas fa-angle-left"></i>
                  </p>
                  </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="" class="nav-link {{ $current_route == 'results'?'active':''}}">
                    <i class="nav-icon fas fa-server"></i>
                    <p>Manage reports</p>
                  </a>
                </li>
              </ul>
            @endcan

            @can('isAdmin')
              <li class="nav-header">GRADES</li>
              <li class="nav-item {{ $current_route == 'grades'?'menu-open':''}}">
                <a href="#" class="nav-link {{ $current_route == 'grades'?'active':''}}">
                  <i class="nav-icon fas fa-calendar"></i>
                  <p>
                    Grades
                  <i class="right fas fa-angle-left"></i>
                  </p>
                  </a>
                <ul class="nav nav-treeview">

                <li class="nav-item">
                  <a href="{{ route('grades')}}" class="nav-link {{ $current_route == 'grades'?'active':''}}">
                    <i class="nav-icon fas fa-bars"></i>
                    <p>Manage grades</p>
                  </a>
                </li>
                </ul>
              </li>
            @endcan

            @can('isAdmin')

                <li class="nav-header">ACADEMIC YEARS</li>
                    <li class="nav-item {{ $current_route == 'academicYears'?'menu-open':''}}">
                  <a href="#" class="nav-link {{ $current_route == 'academicYears'?'active':''}}">
                    <i class="nav-icon fas fa-calendar"></i>
                    <p>
                      Academic years
                      <i class="right fas fa-angle-left"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="{{ route('academicYears')}}" class="nav-link {{ $current_route == 'academicYears'?'active':''}}">
                        <i class="nav-icon fas fa-calendar"></i>
                        <p>Manage years</p>
                      </a>
                    </li>
                  </ul>
                </li>
              @endcan

              @can('isAdmin')
                  <li class="nav-header">SEMESTERS</li>
                  <li class="nav-item {{ $current_route == 'semesters'?'menu-open':''}}">
                      <a href="#" class="nav-link {{ $current_route == 'semesters'?'active':''}}">
                      <i class="nav-icon fas fa-server"></i>
                      <p>
                        Semesters
                        <i class="right fas fa-angle-left"></i>
                      </p>
                      </a>
                  <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{ route('semesters')}}" class="nav-link {{ $current_route == 'semesters'?'active':''}}">
                      <i class="nav-icon fas fa-server"></i>
                      <p>Manage semesters</p>
                    </a>
                  </li>
                  </ul>
                @endcan

                @can('isAdmin')
                    <li class="nav-header">PROGRAMMES</li>
                        <li class="nav-item {{ $current_route == 'programmes'?'menu-open':''}}">
                      <a href="#" class="nav-link {{ $current_route == 'programmes'?'active':''}}">
                        <i class="nav-icon fas fa-calendar"></i>
                        <p>
                          Programmes
                          <i class="right fas fa-angle-left"></i>
                        </p>
                      </a>
                      <ul class="nav nav-treeview">
                        <li class="nav-item">
                          <a href="{{ route('programmes')}}" class="nav-link {{ $current_route == 'programmes'?'active':''}}">
                            <i class="nav-icon fas fa-calendar"></i>
                            <p>Manage programmes</p>
                          </a>
                        </li>
                      </ul>
                    </li>
                  @endcan

                    @can('isAdmin')
                      <li class="nav-header">COLLAGES</li>
                          <li class="nav-item {{ $current_route == 'collages'?'menu-open':''}}">
                        <a href="#" class="nav-link {{ $current_route == 'collages'?'active':''}}">
                          <i class="nav-icon fas fa-calendar"></i>
                          <p>
                            Collages
                            <i class="right fas fa-angle-left"></i>
                          </p>
                        </a>
                        <ul class="nav nav-treeview">
                          <li class="nav-item">
                            <a href="{{ route('collages')}}" class="nav-link {{ $current_route == 'collages'?'active':''}}">
                              <i class="nav-icon fas fa-building"></i>
                              <p>Manage collages</p>
                            </a>
                          </li>
                        </ul>
                      </li>
                    @endcan

                    @can('isAdmin')  
                      <li class="nav-header">DEPARTMENTS</li>
                            <li class="nav-item {{ $current_route == 'departments'?'menu-open':''}}">
                          <a href="#" class="nav-link {{ $current_route == 'departments'?'active':''}}">
                            <i class="nav-icon fas fa-calendar"></i>
                            <p>
                              Departments
                              <i class="right fas fa-angle-left"></i>
                            </p>
                          </a>
                          <ul class="nav nav-treeview">
                            <li class="nav-item">
                              <a href="{{ route('departments')}}" class="nav-link {{ $current_route == 'departments'?'active':''}}">
                                <i class="nav-icon fas fa-building"></i>
                                <p>Manage departments</p>
                              </a>
                            </li>
                          </ul>
                        </li>
                      @endcan

        <li class="nav-header"> </li>
            <li class="nav-item {{ $current_route == ''?'menu-open':''}}">
              <ul class="nav nav-treeview">
              <li class="nav-item">
            </li>
          </ul>
   
  </nav>
  </div>
</aside>
