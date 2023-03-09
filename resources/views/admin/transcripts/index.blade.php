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
                                        <h3>Classes
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
                                                        <th>Class | Programme of study</th> 
                                                        <th>Academic year</th>                                 
                                                        @if(auth()->user()->role == '1')
                                                        <th>Action</th>
                                                        @endif
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($classes as $index=>$class)
                                                        <tr>
                                                            <td>{{ $index+1 }}</td>
                                                            <td>{{ $class->name }} :: {{ $class->programme->name }}</td>
                                                            <td>{{ $class->academic_year->name }}</td>
                                                            @if(auth()->user()->role == '1')
                                                            <td><a href="/auth/transcripts/classes/{{$class->id}}" class="btn btn-secondary">Preview</a></td>
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