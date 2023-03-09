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
                                    <div class="card-header">
                                        <h3>Mark examination
                                            <a href="{{ route('examinations')}}" class="btn btn-danger float-right">BACK</a> 
                                        </h3>
                                    </div>
                                    <div class="card-body">
                                        <form action="{{ route('fetchClasses')}}" method="post">
                                            @csrf       
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <fieldset>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label>Academic year name<span class="text-danger">*</span></label>
                                                                    <select id="year" name="year" class="form-control selector" required>
                                                                        <option value="" selected>Select academic year</option>
                                                                        @if(!@empty($years))
                                                                            @foreach ($years as $year)
                                                                                <option value="{{ $year->id }}">{{ $year->name }}</option>
                                                                            @endforeach
                                                                        @endif
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label>Examination name<span class="text-danger">*</span></label>
                                                                    <select id="exam" name="exam" class="form-control selector" required>
                                                                        <option value="" selected>Select examination</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </fieldset>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <button type="submit" class="btn btn-primary">Mark examination</button>
                                                    </div>
                                                </div>
                                        
                                            </div>
                                        
                                        </form> 
                                    </div>  
                                </div>
                        </div>
                    </div>
                </div> 
        </section>
    </div>
    @include('admin.includes.footer')