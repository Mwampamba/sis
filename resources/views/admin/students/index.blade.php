@include('admin.includes.header')
<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper"> 
    @include('admin.includes.navbar')

    @include('admin.includes.sidebar')
    <div class="content-wrapper">
        <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            </div>
        </div> 
        </div>
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                                <div class="card">
                                    @if(auth()->user()->role == '1')
                                    <div class="card-header">
                                        <h3>Students
                                            <a href="{{ route('addStudent')}}" class="btn btn-success float-right" style="margin-right: 5px;">Register new student</a> 
                                            <a href="{{route('bulkAddstudents')}}" class="btn btn-primary float-right" style="margin-right: 5px;">Register new student(s) using excel</a> 
                                        </h3>
                                    </div>
                                    @endif
                                        <div class="card-body">
                                            <div class="card">
                                            <table id="myDataTable" class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Student name</th>    
                                                        <th>Programme of study</th>                                        
                                                        @if(auth()->user()->role == '1') 
                                                        <th>Profile</th>  
                                                        <th>Action</th>
                                                        <th>Action</th>
                                                        <th>Action</th>
                                                        @endif
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($students as $index=>$student)
                                                        <tr>
                                                            <td>{{ $index+1 }}</td>
                                                            <td>{{ $student->name }}</td>
                                                            <td>{{ $student->class->name }} :: {{ $student->programme->name }}</td>
                                                            @if(auth()->user()->role == '1')
                                                            <td><a href="{{ route('studentTranscript', $student->id)}}" class="btn btn-secondary">Profile</a></td>
                                                            <td><a href="/auth/students/{{$student->id}}" class="btn btn-warning">Edit</a></td>
                                                            <td><a href="{{ route('restorePassword',$student->id) }}" class="btn btn-danger">Restore</a></td>
                                                            <td><a href="/auth/students/delete/{{$student->id}}" onclick="return confirm('Are you sure you want to delete this student?')" class="btn btn-danger">Delete</a></td>
                                                            @endif
                                                        </tr>
                                                    @endforeach
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