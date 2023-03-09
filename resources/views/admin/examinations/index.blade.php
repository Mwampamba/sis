@include('admin.includes.header')

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper"> 
    @include('admin.includes.navbar') 
    @include('admin.includes.sidebar') 
    <div class="content-wrapper"> 
        <div class="content-header"> 
        </div> 
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                                <div class="card">
                                    @can('isAdmin')
                                        <div class="card-header">
                                            <h3>Examinations
                                                <a href="{{ route('addExamination') }}" class="btn btn-success float-right">Add new examination</a> 
                                                <a href="{{ route('deactivatedExaminations')}}" class="btn btn-danger float-right" style="margin-right: 5px;">View deactivated examinations</a> 
                                            </h3>
                                            
                                        </div>
                                    @endcan
                                        <div class="card-body">
                                            <div class="card">
                                            <table id="myDataTable" class="table table-bordered">
                                                <thead>
                                                    <tr> 
                                                        <th>#</th>
                                                        <th>Examination name</th>
                                                        <th>Academic year</th>
                                                        <th>Status</th>
                                                        <th>Action</th>
                                                        @if(auth()->user()->role == '1') 
                                                        <th>Action</th>
                                                        @endif
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($exams as $index=>$exam)
                                                        <tr>
                                                            <td>{{ $index+1 }}</td>
                                                            <td>{{ $exam->exam_name }}</td>
                                                            <td>{{ $exam->semester->name }} :: {{ $exam->academic_year->name}}</td>
                                                            <td>{{ $exam->status == 1 ? 'Marked' : 'Deactivated' }}</td>
                                                            <td><a href="{{ route('markExamination')}}" class="btn btn-secondary">View | Add marks</a></td>
                                                            @if(auth()->user()->role == '1')
                                                             <td><a href="{{ route('deactivateExamination', $exam->id )}}" onclick="return confirm('Are you sure you want to deactivate this exam?')" class="btn btn-danger">Deactivate</a></td>
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