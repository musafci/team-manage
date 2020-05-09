@extends('backoffice.app')


@section('stylesheet')
<!-- JQuery DataTable Css -->
<link href="{{ asset('assets/backoffice/')}}/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">

<!-- Bootstrap Select Css -->
<link href="{{ asset('assets/backoffice/')}}/plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />

<!-- Multi Select Css -->
<link href="{{ asset('assets/backoffice/')}}/plugins/multi-select/css/multi-select.css" rel="stylesheet">

<!-- Bootstrap DatePicker Css -->
<link href="{{ asset('assets/backoffice/')}}/plugins/bootstrap-datepicker/css/bootstrap-datepicker.css" rel="stylesheet" />



<style>
    .button-demo .btn{margin-bottom: 0px !important;}
    .button-custom-dt {float: left;margin-right: 5px;}
</style>
@endsection


@section('content')
<div id="app">

    <div class="container-fluid">
        
        <!-- Material Design Colors -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="body">
                        <div class="button-demo js-modal-buttons">
                            <button type="button" data-color="deep-purple" class="btn bg-deep-purple waves-effect" data-toggle="modal" data-target="#addProject">
                                Add Project
                            </button>
                            <button type="button" data-color="deep-purple" class="btn bg-deep-purple waves-effect" data-toggle="modal" data-target="#addProject">
                                Archive Project
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Material Design Colors -->


        <!-- Add New Project -->
        <div class="modal fade" id="addProject" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">

                    <form method="POST" action="{{ route('project.store') }}">
                        @csrf
                        
                        <div class="modal-header"></div>

                        <div class="modal-body">
                            <div class="container-fluid">
                                <div class="row clearfix">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="card" style="margin-bottom: 0px;">
                                            <div class="header">
                                                <h2>
                                                    Add New Project
                                                </h2>                                                                                     
                                            </div>                                        

                                            <div class="body">
                                                <label for="name">Name</label>
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <input type="text" id="name" name="name" value="{{ old('name') }}" class="form-control">
                                                    </div>
                                                    @error('name')
                                                        <span class="text-danger" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>

                                                <label for="description">Description</label>
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <input type="text" id="description" name="description" value="{{ old('description') }}" class="form-control">
                                                    </div>
                                                    @error('description')
                                                        <span class="text-danger" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>


                                                <label for="bs_datepicker_range_container">Timeline</label>
                                                <div class="input-daterange input-group" id="bs_datepicker_range_container">
                                                    <div class="form-line">
                                                        <input type="text" name="start_date" value="{{ old('start_date') }}" class="form-control" placeholder="Date start...">
                                                    </div>
                                                    @error('start_date')
                                                        <span class="text-danger" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                    <span class="input-group-addon">to</span>
                                                    <div class="form-line">
                                                        <input type="text" name="end_date" value="{{ old('end_date') }}" class="form-control" placeholder="Date end...">
                                                    </div>
                                                    @error('end_date')
                                                        <span class="text-danger" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>

                                                <label for="color">Project Color</label>                                                
                                                <div class="demo-checkbox">
                                                    <input type="checkbox" name="color" value="#F44336" id="md_checkbox_21" class="filled-in chk-col-red" />
                                                    <label for="md_checkbox_21">RED</label>
                                                    <input type="checkbox" name="color" value="#E91E63" id="md_checkbox_22" class="filled-in chk-col-pink" />
                                                    <label for="md_checkbox_22">PINK</label>
                                                    <input type="checkbox" name="color" value="#3F51B5" id="md_checkbox_25" class="filled-in chk-col-indigo" />
                                                    <label for="md_checkbox_25">INDIGO</label>
                                                    <input type="checkbox" name="color" value="#2196F3" id="md_checkbox_26" class="filled-in chk-col-blue" />
                                                    <label for="md_checkbox_26">BLUE</label>
                                                    <input type="checkbox" name="color" value="#4CAF50" id="md_checkbox_30" class="filled-in chk-col-green" />
                                                    <label for="md_checkbox_30">GREEN</label>
                                                    <input type="checkbox" name="color" value="#FF9800" id="md_checkbox_35" class="filled-in chk-col-orange" />
                                                    <label for="md_checkbox_35">ORANGE</label>
                                                    <input type="checkbox" name="color" value="#FF5722" id="md_checkbox_36" class="filled-in chk-col-deep-orange" />
                                                    <label for="md_checkbox_36">DEEP ORANGE</label>
                                                    <input type="checkbox" name="color" value="#607D8B" id="md_checkbox_39" class="filled-in chk-col-blue-grey" />
                                                    <label for="md_checkbox_39">BLUE GREY</label>
                                                    <input type="checkbox" name="color" value="#000000" id="md_checkbox_40" class="filled-in chk-col-black" />
                                                    <label for="md_checkbox_40">BLACK</label>

                                                    @error('color')
                                                        <span class="text-danger" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>

                                                <label for="assign_to">Assign To</label>
                                                <div class="demo-radio-button">
                                                    <input name="assign_to" value="1" type="radio" @click="specificTeamMember = false" id="radio_7" class="radio-col-red" checked />
                                                    <label for="radio_7">Only Me</label>
                                                    <input name="assign_to" value="2" type="radio" @click="specificTeamMember = false" id="radio_12" class="radio-col-blue" />
                                                    <label for="radio_12">Organization</label>
                                                    <input name="assign_to" value="3" type="radio" @click="specificTeamMember = true" id="radio_16" class="radio-col-green" />
                                                    <label for="radio_16">Specific Team Member</label>

                                                    @error('assign_to')
                                                        <span class="text-danger" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                                                                
                                                <div v-show="specificTeamMember">                                                    
                                                    <label for="assign_to">Search Team Member</label>
                                                    <select name="specific_team[]" class="form-control show-tick" multiple data-live-search="true">
                                                        @if(count($users))
                                                            @foreach($users as $user)
                                                                <option style="margin-left: 30px" value="{{ $user->id }}">{{ $user->name }} - {{  $user->role == 1 ? "Admin" : ($user->role == 2 ? "User" : "Client") }}</option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                </div>
                                                                                            
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-link waves-effect">SAVE PROJECT</button>
                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                        </div>

                    </form>

                </div>
            </div>
        </div>

        <!-- </div>


    <div class="container-fluid"> -->

        <!-- Members -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            Projects List
                        </h2>                   
                        <ul class="header-dropdown m-r--5">
                            <li class="dropdown">
                                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                    <i class="material-icons">more_vert</i>
                                </a>
                                <ul class="dropdown-menu pull-right">
                                    <li><a href="javascript:void(0);">Action</a></li>
                                    <li><a href="javascript:void(0);">Another action</a></li>
                                    <li><a href="javascript:void(0);">Something else here</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Project Name</th>
                                        <th>Description</th>                                        
                                        <th>Action</th>
                                    </tr>
                                </thead>
                            
                                <tbody>

                                @if(count($projects))
                                    
                                    @foreach($projects as $key=>$project)                                        
                                        <tr>
                                            <td>{{ $key+1 }}</td>
                                            <td>{{ $project->name }}</td>
                                            <td>{{ $project->description }}</td>                                            
                                            
                                            <td>
                                                <div class="demo-google-material-icon">                                                     
                                                    <form action="{{ route('project.destroy', $project->id) }}" method="post">
                                                        @method('DELETE')
                                                        @csrf
                                                        <button type="submit" class="material-icons btn bg-red btn-xs waves-effect button-custom-dt" onclick="return confirm('Are you sure to delete?')">
                                                            delete_forever
                                                        </button>                                                        
                                                    </form>
                                                </div>

                                                <div class="demo-google-material-icon">
                                                    <a data-target="#updateTeamMember-{{$key+1}}" data-toggle="modal" class="material-icons btn btn-info btn-xs waves-effect button-custom-dt">
                                                        edit
                                                    </a>
                                                </div>
                                            </td>                        
                                        </tr>

                                        <div class="modal fade" id="updateTeamMember-{{$key+1}}" tabindex="-1" role="dialog">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">

                                                    <form method="POST" action="{{ route('project.update', $project->id) }}">
                                                        @method('PUT')
                                                        @csrf
                                                        
                                                        <div class="modal-header">
                                                            
                                                        </div>

                                                        <div class="modal-body">
                                                            <div class="container-fluid">
                                                                <div class="row clearfix">
                                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-bottom: 0px;">
                                                                        <div class="card" style="margin-bottom: 0px;">
                                                                            <div class="header">
                                                                                <h2>
                                                                                    Update {{ $project->name }}'s Info
                                                                                </h2>                                                                                     
                                                                            </div>                                        

                                                                            <div class="body">
                                                                                <label for="name">Name</label>
                                                                                <div class="form-group">
                                                                                    <div class="form-line">
                                                                                        <input type="text" id="name" name="name" value="{{ $project->name }}" class="form-control">
                                                                                    </div>
                                                                                    @error('name')
                                                                                        <span class="text-danger" role="alert">
                                                                                            <strong>{{ $message }}</strong>
                                                                                        </span>
                                                                                    @enderror
                                                                                </div>

                                                                                <label for="email">Email</label>
                                                                                <div class="form-group">
                                                                                    <div class="form-line">
                                                                                        <input type="email" id="email" name="email" value="{{ $project->email }}" class="form-control">
                                                                                    </div>
                                                                                    @error('email')
                                                                                        <span class="text-danger" role="alert">
                                                                                            <strong>{{ $message }}</strong>
                                                                                        </span>
                                                                                    @enderror
                                                                                </div>

                                                                                <label for="password">Password</label>
                                                                                <div class="form-group">
                                                                                    <div class="form-line">
                                                                                        <input type="password" id="password" name="password" class="form-control">
                                                                                    </div>
                                                                                    @error('password')
                                                                                        <span class="text-danger" role="alert">
                                                                                            <strong>{{ $message }}</strong>
                                                                                        </span>
                                                                                    @enderror
                                                                                </div>
                                                
                                                                                <label for="role">Role</label>
                                                                                <div class="form-group">
                                                                                    <select id="role" class="form-control show-tick" name="role">
                                                                                        <option value="1" {{ $project->role == 1 ? "selected" : "" }}> Admin </option>
                                                                                        <option value="2" {{ $project->role == 2 ? "selected" : "" }}> Team </option>
                                                                                        <option value="3" {{ $project->role == 3 ? "selected" : "" }}> Client </option>
                                                                                    </select>
                                                                                    @error('role')
                                                                                        <span class="text-danger" role="alert">
                                                                                            <strong>{{ $message }}</strong>
                                                                                        </span>
                                                                                    @enderror
                                                                                </div>

                                                                                <label for="status">Status</label>
                                                                                <div class="form-group">
                                                                                    <select id="status" class="form-control show-tick" name="status">
                                                                                        <option value="1" {{ $project->status == 1 ? "selected" : "" }}> Active </option>
                                                                                        <option value="0" {{ $project->status == 0 ? "selected" : "" }}> Disable </option>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="modal-footer">
                                                            <button type="submit" class="btn btn-link waves-effect">UPDATE</button>
                                                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                                                        </div>

                                                    </form>

                                                </div>
                                            </div>
                                        </div>

                                    @endforeach
                                @endif
                                 
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Members -->

    </div>

</div>
@endsection


@section('beforeAdminscript')
<!-- Bootstrap Notify Plugin Js -->
<script src="{{ asset('assets/backoffice/')}}/plugins/bootstrap-notify/bootstrap-notify.js"></script>

<!-- Jquery DataTable Plugin Js -->
<script src="{{ asset('assets/backoffice/')}}/plugins/jquery-datatable/jquery.dataTables.js"></script>
<script src="{{ asset('assets/backoffice/')}}/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>

<!-- Moment Plugin Js -->
<script src="{{ asset('assets/backoffice/')}}/plugins/momentjs/moment.js"></script>

<!-- Multi Select Plugin Js -->
<script src="{{ asset('assets/backoffice/')}}/plugins/multi-select/js/jquery.multi-select.js"></script>

<!-- Bootstrap Datepicker Plugin Js -->
<script src="{{ asset('assets/backoffice/')}}/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>



@endsection


@section('afterAdminscript')
<!-- Jquery DataTable Plugin Custome -->
<script src="{{ asset('assets/backoffice/')}}/js/pages/tables/jquery-datatable.js"></script>
<!-- Modals Custome -->
<script src="{{ asset('assets/backoffice/')}}/js/pages/ui/modals.js"></script>


@endsection


@section('customScript')

@if(Session::has('errors'))
    <script>
        $('#addProject').modal('show')
    </script>
@endif




<script>
    let app = new Vue({
        el: '#app',

        data: {
            specificTeamMember: false,
        },


    });
</script>


<script>
    $('#bs_datepicker_range_container').datepicker({
        autoclose: false,
        container: '#bs_datepicker_range_container',
        format: 'dd-mm-yyyy',
    });

    $('input[type="checkbox"]').on('change', function() {
        $(this).siblings('input[type="checkbox"]').prop('checked', false);
    });
</script>


@endsection