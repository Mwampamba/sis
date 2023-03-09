@include('admin.includes.header')

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
    @include('admin.includes.student.navbar')
    @include('admin.includes.student.sidebar')
    <div class="content-wrapper">
      <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-12">
            </div>
            </div>
        </div>
      </div>
      <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                        <div class="card">
                          <div class="card-header">
                            <div class="row no-print">
                              <div class="col-12"> 
                                <a href="{{ route('classes')}}" class="btn btn-danger float-right"> BACK
                                </a> 
                              </div>
                            </div>
                          </div>

                          <div class="row">
                            <div class="col-md-2">
                              <div class="card-body box-profile">
                                @if($student_profile->profile) 
                                  <div class="text-center">
                                    <img src="{{asset($student_profile->profile)}}" class="img-rounded border elevation-2" style="width:125px;height:110px" alt="Student profile">
                                  </div> 
                                @else
                                <div class="text-center">
                                  <img src="{{asset('profile/student/default-profile.jpg')}}" class="img-rounded border elevation-2" style="width:125px;height:110px" alt="Student profile">
                                </div>
                                @endif
                              </div>
                            </div>
  
                            <div class="col-md-10">
                              <br>
                              <table class="table table-bordered">
                                  <thead>
                                    <tr> 
                                        <th>Name</th>  
                                        <th>Student ID</th>
                                        <th>Programme of study</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                      <tr>
                                          <td>{{ $student_profile->name }}</td>
                                          <td>{{ $student_profile->reg_number }}</td> 
                                          <td>{{ $student_profile->programme->name }}</td> 
                                      </tr>  
                                 </tbody>
                              </table>
                            </div>
                          </div>
                          <h3 class="text-center">No records!</h3> 
                        </div>
                      </div>
                    </div>
            </section>
        </div>
@include('admin.includes.footer')
