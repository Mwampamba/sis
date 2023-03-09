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
                                        <h3>Students' transcripts
                                            <a href="{{ route('dashboard')}}" class="btn btn-danger float-right">BACK</a> 
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
                                                        <th>Class | Programme of study</th> 
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($students as $index=>$student)
                                                        <tr>
                                                            <td>{{ $index+1 }}</td>
                                                            <td>{{ $student->name }}</td>
                                                            <td>{{ $student->class->name }} :: {{ $student->programme->name }}</td>
                                                            <td><a href="/auth/transcripts/class/{{$student->id}}" class="btn btn-secondary">View transcript</a></td>
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