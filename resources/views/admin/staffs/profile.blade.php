@include('admin.includes.header')

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper"> 
    @include('admin.includes.navbar') 

    @include('admin.includes.sidebar') 
    <div class="content-wrapper"> 
        <div class="content-header">
        </div> 
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                      <div class="row no-print">
                                        <div class="col-12">
                                          <button type="button" class="btn btn-default float-right"><i class="fas fa-print"></i>
                                            Print
                                          </button>
                                          <button type="button" class="btn btn-default float-right" style="margin-right:5px;">
                                            <i class="fas fa-download"></i> Generate PDF
                                          </button>
                                        </div>
                                      </div><br>
                                      <div class="row">
                                        <div class="col-sm-2">
                                          <div class="card-body box-profile">
                                            @if($staff->picture) 
                                              <div class="text-center">
                                                <img src="{{asset('profile/staff/'.$staff->picture)}}" class="img-rounded border elevation-2" style="width:125px;height:100px" alt="profile">
                                              </div>  
                                            @else
                                            <div class="text-center">
                                              <img src="{{asset('profile/staff/default-profile.jpg')}}" class="img-rounded border elevation-2" style="width:125px;height:110px" alt="profile">
                                            </div>
                                            @endif
                                          </div>
                                        </div>
                                        <div class="col-sm-10">
                                          <table class="table table-bordered">
                                            <thead>
                                                <tr> 
                                                  <th>Full name</th>  
                                                  <th>Email address</th>
                                                  <th>Mobile phone</th>
                                                  <th>Departiment</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>{{ $staff->name }}</td>
                                                    <td>{{ $staff->email }}</td> 
                                                    <td>{{ $staff->phone}}</td> 
                                                    <td>{{ $staff->department->name}}</td> 
                                                </tr> 
                                           </tbody>
                                       </table>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="card-header">
                                          @if (($courses)->count() > 0)
                                            <div class="col-sm-12">
                                              <h5 class="m-0 text-left">Teaching courses</h5><br>
                                            </div>
                                              <table class="table table-bordered">
                                                  <thead>
                                                      <tr> 
                                                          <th>#</th>  
                                                          <th>Course title</th>  
                                                          <th>Course code</th>
                                                          <th>Course status</th>  
                                                          <th>Course credit</th>
                                                      </tr>
                                                  </thead>
                                                  <tbody>
                                                      @foreach($courses as $index=>$course)
                                                          <tr>
                                                              <td>{{ $index+1 }}</td> 
                                                              <td>{{ $course->title }}</td>
                                                              <td>{{ $course->code }}</td> 
                                                              <td>{{ $course->status == 1 ? 'Core' : 'Option'}}</td>
                                                              <td>{{ $course->credit }}</td> 
                                                          </tr> 
                                                      @endforeach
                                                 </tbody>
                                             </table>
                                            </div>
                                              @else
                                                  <div class="col-sm-12">
                                                    <h4 class="m-0 text-center">No records!</h4>
                                                  </div> 
                                              @endif
                                          </div>
                                      </div>
                                  </div>
                            </div>
                      </div> 
            </section>
    </div> 
@include('admin.includes.footer')
