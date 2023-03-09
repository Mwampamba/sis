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
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                                <div class="card">
                                    @if(auth()->user()->role == '1')
                                    <div class="card-header">
                                        <h3>Classes 
                                            <a href="{{route('addClass')}}" class="btn btn-success float-right">Add new class</a> 
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
                                                        @if(auth()->user()->role == '1')
                                                        <th>Action</th>
                                                        <th>Action</th>
                                                        <th>Action</th>
                                                        @endif
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($classes as $index=>$class)
                                                        <tr>
                                                            <td>{{ $index+1 }}</td>
                                                            <td>{{ $class->name }} :: {{ $class->programme->name }}</td>
                                                            @if(auth()->user()->role == '1')
                                                            <td><a href="/auth/classes/view/{{$class->id}}" class="btn btn-secondary">View class members</a></td>
                                                            <td><a href="/auth/classes/{{$class->id}}" class="btn btn-warning">Edit</a></td>
                                                            <td><a href="/auth/classes/delete/{{$class->id}}" onclick="return confirm('Are you sure you want to delete this class?')" class="btn btn-danger">Delete</a></td>
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
        <!-- /.content -->
        </section>
    </div>
    <!-- /.content-wrapper -->
    @include('admin.includes.footer')