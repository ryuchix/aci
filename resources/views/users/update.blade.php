@extends('layouts.app')
@section('pagename', 'Update User')


@section('header')
<style type="text/css">
	.bootstrap-select{
		width: 100% !important;
	}
	.dark-edition .btn {
		background-color: #1a2035 !important;
		box-shadow: none;
		margin-top: -10px;
		margin-bottom: -10px;

	}
	.bootstrap-select .dropdown-toggle .filter-option {
		padding-left: initial !important;
	}
	.img-raised {
		box-shadow: none;
	}
</style>
@endsection

@section('content')

<div class="col-md-12">
	{!! Form::model($user,['route' => ['users.update', $user->id], 'method' => 'PATCH', 'enctype' => 'multipart/form-data']) !!}
    	<div class="row">
		  	<div class="col-md-12">
			    <div class="form-group">
			    	<label class="bmd-label-floating">Name</label>
			    	<input type="text" class="form-control" placeholder="Angel Locsin" name="name" autocomplete="off" value="{{ $user->name }}">
			    </div>
			    <div class="form-group">
			    	<label class="bmd-label-floating">Email Address</label>
			    	<input type="text" class="form-control" placeholder="email@email.com" name="email"autocomplete="off" value="{{ $user->email }}">
			    </div>
				<div class="form-group">
			    	<label class="bmd-label-floating">Role</label>
					<select class="selectpicker form-group" data-style="select-with-transition" title="Select Role" data-size="auto" name="role">
					    <option value="User" {{ $user->role == "User" ? "Selected" : "" }}>User</option>
					    <option value="Admin" {{ $user->role == "Admin" ? "Selected" : "" }}>Admin</option>
					</select>
				</div>
				<div class="form-group">
			    	<label class="bmd-label-floating">Department</label>
					<select class="selectpicker form-group" data-style="select-with-transition" title="Select Department" data-size="auto" name="department_id">
					    @foreach($departments as $department)
					    <option value="{{ $department->id }}" {{ $user->department_id == $department->id ? "Selected" : "" }}>{{ $department->name }}</option>
					    @endforeach
				    </select>
				</div>

				<div class="form-group">
			    	<label class="bmd-label-floating">Upload Image</label>
					<div class="fileinput fileinput-new text-center" data-provides="fileinput" style="text-align: left;">
						<div class="fileinput-new thumbnail img-raised" style="margin-bottom: 20px">
							<img src="{{ ($user->image == null) ? asset('img/new_logo.png') : asset('uploads/images/' . $user->image) }}" alt="..." width="100px" id="imageP">
						</div>
						<div class="fileinput-preview fileinput-exists thumbnail img-raised"></div>
						<div>
							<span class="btn btn-raised btn-round btn-default btn-file">
								<span class="fileinput-new">Select image</span>
								<input type="file" name="image" id="imagefile" />
							</span>
						</div>
					</div>
				</div>
		  	</div>
    	</div>
	    <button type="submit" class="btn btn-primary pull-right" style="background-color: #ef8706 !important">Update</button>
	    <div class="clearfix"></div>
	{!! Form::close() !!}
</div>

@include('error.error')
@include('message.message')

@endsection

@section('script')
<script type="text/javascript">

	$('.fileinput-new').on('click', function(){
		$(this).siblings().trigger('click');
	});

	var reader = new FileReader();
	reader.onload = function (e) {
	    $('#imageP').attr('src', e.target.result);
	}
   
   function readURL(input) {
        if (input.files && input.files[0]) {
            reader.readAsDataURL(input.files[0]);
        }
    }
    
    $("#imagefile").change(function(){
        readURL(this);
    });


</script>
@endsection