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
                                        <h3>Staffs
                                            <a href="{{ route('addStaff')}}" class="btn btn-success float-right" style="margin-right: 5px;">Register new staff</a> 
                                            <a href="{{ route('bulkAddStaffs')}}" class="btn btn-primary float-right" style="margin-right: 5px;">Register new staff(s) using excel</a>
                                            
                                        </h3>
                                     </div>
                                    @endif
                                        <div class="card-body">
                                            <div class="card">
                                            <table id="myDataTable" class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Staff name</th>   
                                                        <th>Email address</th>  
                                                        <th>Department</th>                                   
                                                        @if(auth()->user()->role == '1')
                                                        <th>Profile</th>    
                                                        <th>Action</th>
                                                        <th>Action</th>
                                                        @endif
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($staffs as $index=>$staff)
                                                        <tr>
                                                            <td>{{ $index+1 }}</td>
                                                            <td>{{ $staff->name }}</td>
                                                            <td>{{ $staff->email }}</td>
                                                            <td>{{ $staff->department->name }}</td>
                                                            @if(auth()->user()->role == '1')
                                                            <td><a href="{{ route('staffProfile', $staff->id) }}" class="btn btn-secondary">Profile</a></td>
                                                            <td><a href="/auth/staffs/{{$staff->id}}" class="btn btn-warning">Edit</a></td>
                                                            <td><a href="/auth/staffs/delete/{{$staff->id}}" onclick="return confirm('Are you sure you want to delete this staff?')" class="btn btn-danger">Delete</a></td>
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