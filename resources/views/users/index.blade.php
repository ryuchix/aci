@extends('layouts.app')
@section('pagename', 'Users List')

@section('header')
<style type="text/css">
	.imgs {
		border-radius: 50%;
		width: 30px;
		height: 30px;
	}
</style>
@endsection

@section('content')

<div class="col-md-12">
	<div class="card card-plain">
    	<div class="card-header card-header-primary">
	      	<a href="{{ url('dashboard/users/create') }}"><i class="material-icons pull-right" style="font-size: 40px">add</i></a>
      		<h4 class="card-title mt-0"> Users List</h4>
	      	<p class="card-category"> Here are the users list. To add new on list, click the Plus icon.</p>
	    </div>
	    <div class="card-body">
	      	<div class="table-responsive">
	       		<table class="table table-hover">
		          	<thead class="">
			            <th>#</th>
			            <th>Image</th>
			            <th>Name</th>
			            <th>Email</th>
			            <th>Role</th>
			            <th>Department</th>
			            <th>Action</th>
					</thead>
		          	<tbody>
		          		@php $count = 1 @endphp
		          		@foreach($users as $user)
			            <tr>
			              <td>{{ $count }}</td>
			              <td><img src="{{ ($user->image == null) ? asset('img/new_logo.png') : asset('uploads/images/' . $user->image) }}"></td>
			              <td>{{ $user->name }}</td>
			              <td>{{ $user->email }}</td>
			              <td>{{ $user->role }}</td>
			              <td>{{ $user->department['name'] }}</td>
			              <td>
							  <div class="timeline-footer">

							    <a href="{{ route('users.edit', $user->id) }}"><i class="material-icons" style="color: #ccc" title="edit">edit</i></a>
							    {!! Form::model($user ,['route' => ['users.destroy', $user->id], 'method' => 'DELETE', 'style' => 'display: inline-block', 'class' => 'form-inline form-delete']) !!}
							    <a href="#/"><i class="material-icons delete" style="color: red" title="delete">delete</i></a>
							    <a href="{{ url('dashboard/users/change-password/'.$user->id) }}"><i class="material-icons" style="color: #ccc" title="reset password">lock</i></a>
							    {!! Form::close() !!}
							  </div>
			              </td>
			            </tr>
			            @php $count ++ @endphp
			            @endforeach
		          	</tbody>
		        </table>
	      	</div>
	    </div>
  	</div>
</div>

@include('error.error')
@include('message.message')

@endsection

@section('script')

<script type="text/javascript">
	$(document).ready(function(){
		$('.delete').on('click', function(){
			$(this).closest('form').submit();
		});
	});
</script>

@endsection
