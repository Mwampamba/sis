@include('admin.includes.header')

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
    @include('admin.includes.navbar')
    @include('admin.includes.sidebar')
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
                                <a href="{{ route('publishExaminationResults', [$exam->id])}}" onclick="return confirm('Are you sure you want to publish examination results?')" class="btn btn-danger float-right">
                                  <i class="fas fa-upload"></i> Publish examination results
                                </a> 
                              </div>
                            </div>
                          </div>

                           
                        <div class="row">
                          <div class="col-sm-2">
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

                          <div class="col-sm-10">
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
                                  @foreach($student as $student)
                                      <tr>
                                          <td>{{ $student->name }}</td>
                                          <td>{{ $student->reg_number }}</td> 
                                          <td>{{ $student_profile->programme->name }}</td> 
                                      </tr> 
                                    @endforeach
                               </tbody>
                            </table>
                          </div>
                        </div>
                            <div class="card-body">
                              <div class="card-header">
                                <div class="col-sm-12">
                                  @foreach ($ac_year_and_semester as $item)
                                    <h4 class="m-0 text-left">{{$item->semester}} :: {{$item->year}}</h4>
                                @endforeach
                              </div>
                                  <table class="table table-bordered">
                                      <thead>
                                          <tr> 
                                            <th>#</th>  
                                            <th>Course title</th>
                                            <th>Code</th> 
                                            <th>Type</th>
                                            <th>Credit</th>
                                            <th>Score</th>  
                                            <th>Grade</th>
                                            <th>Point</th>
                                          </tr>
                                      </thead>
                                      <tbody>
                                        @foreach($score_results as $index=>$course)
                                        <tr>
                                            <td>{{ $index+1 }}</td>
                                            <td>{{ $course->title }}</td>
                                            <td>{{ $course->code }}</td> 
                                            <td>{{ $course->status == 1 ? 'Core' : 'Optional' }}</td> 
                                            <td>{{ $course->credit }}</td> 
                                            <td>{{ $course->score }}</td>
                                            <td>{{ $course->grade }}</td>
                                            <td>{{ $course->point }}</td> 
                                        </tr> 
                                      @endforeach
                                     </tbody>
                                 </table>

                                        <?php 
                                          
                                          (int)$sum_of_credit_and_point = 0;
                                          (int)$total_credits = 0;
                                          (int)$total_points = 0;
                                          (int)$average = 0;
                                          (int)$scores = 0;
                                          (int)$counter = 0;
                                        
                                            foreach ($score_results as $score) {
                                              $scores += ((int)($score->score));
                                              $total_points += ((int)($score->point));
                                              $sum_of_credit_and_point += (((int)($score->credit)) * ((int)($score->point)));
                                              $total_credits += ((int)($score->credit));

                                            $counter++;
                                        }
                                        (float)$average = ($scores / $counter);
                                          (float)$gpa = ($sum_of_credit_and_point / $total_credits);
                                        ?>
  
                                <table class="table table-bordered">
                                  <thead>
                                      <tr> 
                                          <th>Average score</th>  
                                          <th>Total credits</th>
                                          <th>Total points</th>
                                          <th>Overall G.P.A</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                    <tr>
                                        <td><?php echo round($average, 2); ?></td>
                                        <td><?php echo $total_credits; ?></td> 
                                        <td><?php echo $total_points; ?></td> 
                                        <td><?php echo round($gpa, 2); ?></td> 
                                    </tr>
                                 </tbody>
                             </table>
                          </div>
                        </div>
                    </div>
                </div>
              </div>
      </section>
  </div>
    @include('admin.includes.footer')