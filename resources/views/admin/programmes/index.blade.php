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
                                        <div class="card-header">
                                            <h3>Programmes
                                                <a href="{{route('addProgramme')}}" class="btn btn-success float-right">Add new programme</a> 
                                            </h3>
                                                
                                        </div>
                                            <div class="card-body">
                                                <div class="card">
                                                <table id="myDataTable" class="table table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Programme name</th> 
                                                            <th>Collage</th>                                    
                                                            <th>Action</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($programmes as $index=>$programme)
                                                            <tr>
                                                                <td>{{ $index+1 }}</td>
                                                                <td>{{ $programme->name }}</td>
                                                                <td>{{ $programme->collage->name }}<td><a href="{{ route('editProgramme', $programme->id)}}" class="btn btn-warning">Edit</a></td>
                                                                <td><a href="{{ route('deleteProgramme', $programme->id)}}" onclick="return confirm('Are you sure you want to delete this programmes')" class="btn btn-danger">Delete</a></td>
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
    @include('admin.includes.footer')