@include('admin.includes.header')
<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper"> 
    @include('admin.includes.navbar') 
    @include('admin.includes.sidebar') 
    <div class="content-wrapper"> 
        <div class="content-header">
            <div class="container-fluid">
            </div>
        </div> 
        <!--disable exam marking !-->
            @if ($exam->status != 0)
                <section class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3>Enter student marks
                                                <a href="{{ route('examinations')}}"  class="btn btn-danger float-right">BACK</a>
                                                <a href="{{ route('bulkStudentsScores')}}" class="btn btn-primary float-right" style="margin-right: 5px;">Upload students marks</a> 
                                            </h3>
                                        </div>
                                            <div class="card-body">
                                                    @if(Session::has('success'))
                                                        <div class="alert alert-success" role="alert">{{ Session::get('success') }}</div>
                                                    @endif
                                                    @if(Session::has('delete'))
                                                        <div class="alert alert-danger" role="alert">{{ Session::get('delete') }}</div>
                                                    @endif
                                                
                                            </div>
                                            <div class="card">
                                                <table id="myDataTable" class="table table-bordered table-responsive">
                                                    <thead>
                                                        <tr> 
                                                            <th>#</th>
                                                            <th>Student name</th>
                                                                @foreach($courses as $course)
                                                            <th>{{ $course->code }}</th>  
                                                                @endforeach  
                                                                @if(auth()->user()->role == '1')
                                                            <th>Action</th>
                                                            @endif
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        
                                                        
                                                        @foreach($students as $index=>$student)
                                                            <tr>
                                                                <td>{{ $index+1 }}</td>
                                                                <td>{{ $student->name }}</td>
                                                                
                                                                @foreach($courses as $course)
                                                                    <?php
                                                                        $mark =  \App\Models\ExaminationMark::where([
                                                                            'student_id' => $student->id,
                                                                            'course_id' => $course->id,
                                                                            'examination_id' => $exam->id])->first();
                                                                    ?>
                                                                    <th>
                                                                        <input id="student{{$student->id.$course->id.$exam->id}}" 
                                                                            onchange="savemarks({{$student->id}},{{$course->id}},{{$exam->id}})"
                                                                            value="{{!empty($mark) ? $mark->score : '' }}" type="number" class="form-control rounded">
                                                                        <span id="result{{$student->id.$course->id.$exam->id}}" ></span>
                                                                    </th>  
                                                                @endforeach 
                                                                @if(auth()->user()->role == '1')
                                                                <td><a href="{{ route('previewResults', [$exam->id, $student->id])}}" class="btn btn-secondary">Preview</a></td>
                                                                @endif</tr>
                                                        @endforeach            
                                                    </tbody>
                                                </table>
                                            </div>
                                    </div>
                            </div>
                        </div>
                    </div> 
                </section>
            @else
            <div class="card">
                <div class="col-sm-12">
                    <div class="col-sm-12">
                        <table class="table table-bordered">
                            <thead>
                                <tr> 
                                    <a href="{{ route('dashboard')}}" class="btn btn-danger float-left">You can not mark this examination right now, the examination is not active. Please communicate with Examination officer for more information. Thank you.</a>  
                                </tr>
                            </thead>
                    </table>
                    </div> 
                </div>
            </div>
            @endif 

    </div>
    <script>
    savemarks = function(a,b,c){
        var mark = $('#student'+a+b+c).val();
        if(mark != ''){
        $.ajax({ 
          url: '{{ url("/auth/examinations/post_exam_mark")}}',
          type: 'post',
          data: {student_id: a, course_id: b, exam_id: c, score: mark},
          dataType: 'html',
          success: function(response){

            $('#result'+a+b+c).html(response);
          }
        });
        }
    }
    </script>
    @include('admin.includes.footer')