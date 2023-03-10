@include('admin.includes.header')

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
    <!-- Navbar -->
    @include('admin.includes.navbar')

    <!-- Main Sidebar Container -->

    @include('admin.includes.sidebar')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h3 class="m-0">Lecturer courses</h3>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('dashboard')}}">Home</a></li>
                <li class="breadcrumb-item active">Lecturer courses</li>
                </ol>
            </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>
                                            <a href="{{ route('lecturerCourses')}}" class="btn btn-danger float-right">BACK</a> 
                                        </h4>
                                    </div>
                                    <div class="card-body">
                                        <form action="{{ route('saveLecturerCourses')}}" method="POST">
                                            @csrf
                                            <div class="row">
                                                <div class="col-md-12 mb-3">
                                                    <label for="">Lecturer name</label>
                                                    <select name="lecturer" class="form-control files">
                                                        <option value="">Select lecturer name</option>
                                                        @foreach($lecturers as $lecturer)
                                                            <option value="{{ $lecturer->id }}">{{ $lecturer->name }} </option>
                                                        @endforeach
                                                    </select>
                                                    @error('lecturers')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="col-md-12 mb-3">
                                                    <label for="">Select courses</label>
                                                    <select name="courses[]" class="form-control courses" multiple="multiple">
                                                        @foreach($courses as $course)
                                                            <option value="{{ $course->id }}">{{ $course->title }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('courses')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                
                                                <div class="col-md-12 mb-3">
                                                    <button type="submit" class="btn btn-primary">Save</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>  
                                </div>
                        </div>
                    </div>
                </div>
        <!-- /.content -->
        </section>
    </div>
    <!-- /.content-wrapper -->

    <script>
        $(document).ready( function(){
          $('.courses').select2(
            placeholder:'select',
            allowClear:true,
          );
      
          $('#courses').select2(
            ajax:{
              url:"{{route('saveClassCourses')}}",
              type="post",
              delay:250,
              dataType:'json',
              data: function(params){
                return {
                  name:params.term,
                  "_token":"{{ csrf_token() }}",
                };
              },
      
              processResults:function(data){
                return{
                  results: $.map(data, function(item){
                    return{
                      id: item.id,
                      text: item.title
                    }
                  })
                };
              },
            },
          );
        });
      </script>
      
    @include('admin.includes.footer')