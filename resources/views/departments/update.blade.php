@extends('layouts.app')
@section('pagename', 'Update Department')


@section('content')

<div class="col-md-12">
         {!! Form::model($department,['route' => ['departments.update', $department->id], 'method' => 'PATCH', 'enctype' => 'multipart/form-data']) !!}
    	<div class="row">
		  	<div class="col-md-12">
			    <div class="form-group">
			    	<label class="bmd-label-floating">Name</label>
			    	<input type="text" class="form-control" name="name" value="{{ $department->name }}">
			    </div>
		  	</div>
    	</div>
	    <button type="submit" class="btn btn-primary pull-right" style="background-color: #ef8706 !important">Create</button>
	    <div class="clearfix"></div>
	{!! Form::close() !!}
</div>

@include('error.error')
@include('message.message')

@endsection