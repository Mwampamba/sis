@include('admin.includes.header')

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper"> 
    @include('admin.includes.navbar') 
    @include('admin.includes.sidebar') 
    <div class="content-wrapper"> 
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                <div class="col-sm-6">
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
                                        <h3 class="m-0">Collages
                                            <a href="{{route('addCollage')}}" class="btn btn-success float-right">Add new collage</a> 
                                        </h3></div>
                                        <div class="card-body">
                                            <div class="card">
                                            <table id="myDataTable" class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Collage name</th>      
                                                        <th>Description</th>                                
                                                        <th>Action</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($collages as $index=>$collage)
                                                        <tr>
                                                            <td>{{ $index+1 }}</td>
                                                            <td>{{ $collage->name }}</td>
                                                            <td>{{ $collage->description }}</td>
                                                            <td><a href="{{ route('editCollage', $collage->id) }}" class="btn btn-warning">Edit</a></td>
                                                            <td><a href="{{ route('deleteCollage', $collage->id)}}" onclick="return confirm('Are you sure you want to delete this collage?')" class="btn btn-danger">Delete</a></td>
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