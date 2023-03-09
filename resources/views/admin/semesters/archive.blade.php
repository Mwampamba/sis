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
                                        <h3>Inactive semesters
                                            <a href="{{ route('semesters')}}" class="btn btn-danger float-right">BACK</a> 
                                        </h3>  
                                    </div>
                                        <div class="card-body">
                                            <div class="card">
                                            <table id="myDataTable" class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Semester/ academic year</th>    
                                                        <th>Description</th>  
                                                        <th>Status</th>                                      
                                                        <th>Action</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($semesters as $index=>$semester)
                                                        <tr>
                                                            <td>{{ $index+1 }}</td>
                                                            <td>{{ $semester->name }} :: {{ $semester->academic_year->name }}</td>
                                                            <td>{{ $semester->description}}</td>
                                                            <td>{{ $semester->status == 1 ? 'Active' : 'Deactivated' }}</td>
                                                            <td><a href="{{ route('deleteSemester', $semester->id) }}" onclick="return confirm('Are you sure you want to delete permanent this semester?')" class="btn btn-danger">Delete</a></td>
                                                            <td><a href="{{ route('restoreSemesters', $semester->id) }}" class="btn btn-success">Activate</a></td>
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