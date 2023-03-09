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
                                        <h3>Notes
                                            @if(auth()->user()->role == '1') 
                                        <a href="{{ route('addFolder')}}" class="btn btn-primary float-left">Add folder</a> 
                                        @endif
                                        <a href="{{ route('addFolderFile')}}" class="btn btn-success float-right">Add notes</a>
                                    </h3>
                                    </div>
                                        <div class="card-body">
                                            <div class="card">
                                            <table id="myDataTable" class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Course title</th>  
                                                        <th>Created at</th>                                      
                                                        @if(auth()->user()->role == '1')
                                                        <th>Delete</th>
                                                        @endif
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($folders as $index=>$folder)
                                                        <tr>
                                                            <td>{{ $index+1 }}</td>
                                                            <td><a href="{{ url('/auth/folders/'.$folder->id)}}"><i class="fa fa-folder"> </i> {{ $folder->course->title }}</a></td>
                                                            <td>{{ $folder->course->created_at->format('d-m-Y') }}</td>
                                                            @if(auth()->user()->role == '1') 
                                                            <td><a href="/auth/folders/delete/{{ $folder->id }}" onclick="return confirm('Are you sure you want to remove this folder?')" class="btn btn-danger">Delete</a></td>
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