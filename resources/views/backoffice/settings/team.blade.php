@extends('backoffice.app')


@section('stylesheet')
<!-- JQuery DataTable Css -->
<link href="{{ asset('assets/backoffice/')}}/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">

<!-- Bootstrap Select Css -->
<link href="{{ asset('assets/backoffice/')}}/plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />

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
                            <button type="button" data-color="deep-purple" class="btn bg-deep-purple waves-effect" data-toggle="modal" data-target="#addTeamMember">
                                Add Team Member
                            </button>
                            <!-- <button type="button" class="btn btn-default waves-effect m-r-20" data-toggle="modal" data-target="#addTeamMember">Add New Attribute</button>                             -->
                        </div>
                    </div>

                </div>

                

            </div>
        </div>
        <!-- #END# Material Design Colors -->

        <!-- Add New Team Member -->
        <div class="modal fade" id="addTeamMember" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">

                    <form method="POST" action="{{ route('team.store') }}">
                        @csrf
                        
                        <div class="modal-header">
                            
                        </div>

                        <div class="modal-body">
                            <div class="container-fluid">
                                <div class="row clearfix">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="card" style="margin-bottom: 0px;">
                                            <div class="header">
                                                <h2>
                                                    Add New Team Member
                                                </h2>                                                                                     
                                            </div>                                        

                                            <div class="body">
                                                <label for="name">Name</label>
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <input type="text" id="name" name="name" class="form-control">
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
                                                        <input type="email" id="email" name="email" class="form-control">
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
                                                        <option selected="" disabled="">select</option>
                                                        <option value="1">Admin</option>
                                                        <option value="2">Team</option>
                                                        <option value="3">Client</option>
                                                    </select>
                                                    @error('role')
                                                        <span class="text-danger" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-link waves-effect">SAVE</button>
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
                            Team Members List
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
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                            
                                <tbody>

                                @if(count($teams))
                                    
                                    @foreach($teams as $key=>$team)                                        
                                        <tr>
                                            <td>{{ $key+1 }}</td>
                                            <td>{{ $team->name }}</td>
                                            <td>{{ $team->email }}</td>
                                            <td>
                                                {{  $team->role == 1 ? "Admin" : ($team->role == 2 ? "User" : "Client") }}
                                            </td>
                                            <td>
                                                {{ $team->status == 1 ? "Active" : "Inactive" }}
                                            </td>
                                            
                                            <td>
                                                <div class="demo-google-material-icon">                                                     
                                                    <form action="{{ route('team.destroy', $team->id) }}" method="post">
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

                                                    <form method="POST" action="{{ route('team.update', $team->id) }}">
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
                                                                                    Update {{ $team->name }}'s Info
                                                                                </h2>                                                                                     
                                                                            </div>                                        

                                                                            <div class="body">
                                                                                <label for="name">Name</label>
                                                                                <div class="form-group">
                                                                                    <div class="form-line">
                                                                                        <input type="text" id="name" name="name" value="{{ $team->name }}" class="form-control">
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
                                                                                        <input type="email" id="email" name="email" value="{{ $team->email }}" class="form-control">
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
                                                                                        <option value="1" {{ $team->role == 1 ? "selected" : "" }}> Admin </option>
                                                                                        <option value="2" {{ $team->role == 2 ? "selected" : "" }}> Team </option>
                                                                                        <option value="3" {{ $team->role == 3 ? "selected" : "" }}> Client </option>
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
                                                                                        <option value="1" {{ $team->status == 1 ? "selected" : "" }}> Active </option>
                                                                                        <option value="0" {{ $team->status == 0 ? "selected" : "" }}> Disable </option>
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
            $('#addTeamMember').modal('show')
        </script>
    @endif
@endsection