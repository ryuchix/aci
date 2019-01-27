@extends('layouts.app')
@section('pagename', 'Reset Password')

@section('content')

<div class="col-md-12">
	{{ Form::open(array('action' => "UserController@updatePassword")) }}
    	<div class="row">
		  	<div class="col-md-12">
			    <div class="row">
			    	<div class="col-md-6">
					    <div class="form-group">
					    	<label class="bmd-label-floating">Password</label>
					    	<input type="password" class="form-control" placeholder="**********" name="password" autocomplete="off">
					    </div>
					</div>
			    	<div class="col-md-6">
					    <div class="form-group">
					    	<label class="bmd-label-floating">Confirm Password</label>
					    	<input type="password" class="form-control" placeholder="**********" name="password_confirmation" autocomplete="off">
					    </div>
					</div>
					<input type="hidden" name="id" value="{{ $user->id }}">
				</div>
		  	</div>
    	</div>
	    <button type="submit" class="btn btn-primary pull-right" style="background-color: #ef8706 !important">Change Password</button>
	    <div class="clearfix"></div>
	{{ Form::close() }}
</div>

@include('error.error')
@include('message.message')

@endsection