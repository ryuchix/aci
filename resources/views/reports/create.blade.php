@extends('layouts.app')
@section('pagename', 'Create Report')

@section('header')
<style type="text/css">
	.gj-icon {
		color: #fff;
	}
</style>
@endsection
@section('content')

<div class="col-md-12">
	{!! Form::open([ 'route' => 'reports.store', 'enctype' => 'multipart/form-data'])!!}
    <div class="row" id="particular">
    	<div class="col-md-12">
	  		<input class="datepicker form-control" type="text" placeholder="Pick a date" style="text-align: center;" name="date_posted" required autocomplete="off">
	  	</div>
	  	<div class="col-md-12 particular">
	  		<div class="row">
	  			<div class="col-md-6">
				    <div class="form-group">
				    	<label class="bmd-label-floating">Particular</label>
				    	<input type="text" class="form-control" name="particular[]" required autocomplete="off">
				    </div>
				</div>
	  			<div class="col-md-2">
				    <div class="form-group">
				    	<label class="bmd-label-floating">Percentage</label>
				    	<input type="number" class="form-control" name="percentage[]" autocomplete="off">
				    </div>
				</div>
	  			<div class="col-md-3">
				    <div class="form-group">
				    	<label class="bmd-label-floating">Remarks</label>
				    	<input type="text" class="form-control" name="remarks[]" autocomplete="off">
				    </div>
				</div>
	  			<div class="col-md-1">
				    <div class="form-group">
				    	<label class="bmd-label-floating">Action</label>
				    	<a href="#/"><i class="material-icons delete" title="delete">close</i></a>
				    </div>
				</div>
			</div>
	  	</div>
	</div>
		<div class="form-group">
			<button type="submit" class="btn btn-primary pull-right" style="background-color: #ef8706 !important">Submit</button>
		</div>
	<div class="clearfix"></div>
	{!! Form::close() !!}

	<div class="row">
		<div class="form-group">
			<button class="btn btn-primary pull-right add-particular" style="background-color: #ef8706 !important">Add Particular</button>
		</div>
	</div>

</div>

@include('error.error')
@include('message.message')

@endsection

@section('script')
<script type="text/javascript">
	$(document).on('click','.add-particular', function(){
		var insert =     
		  	'<div class="col-md-12 particular">'+
		  		'<div class="row">'+
		  			'<div class="col-md-6">'+
					    '<div class="form-group">'+
					    	'<label class="bmd-label-floating">Particular</label>'+
					    	'<input type="text" class="form-control" name="particular[]" required autocomplete="off">'+
					    '</div>'+
					'</div>'+
		  			'<div class="col-md-2">'+
					    '<div class="form-group">'+
					    	'<label class="bmd-label-floating">Percentage</label>'+
					    	'<input type="number" class="form-control" name="percentage[]" autocomplete="off">'+
					    '</div>'+
					'</div>'+
		  			'<div class="col-md-3">'+
					    '<div class="form-group">'+
					    	'<label class="bmd-label-floating">Remarks</label>'+
					    	'<input type="text" class="form-control" name="remarks[]" autocomplete="off">'+
					    '</div>'+
					'</div>'+
		  			'<div class="col-md-1">'+
					    '<div class="form-group">'+
					    	'<label class="bmd-label-floating">Action</label>'+
					    	'<a href="#/"><i class="material-icons delete" title="delete">close</i></a>'+
					    '</div>'+
					'</div>'+
				'</div>'+
		  	'</div>';
		$('#particular').append(insert).insertAfter('#particular');
	});

	$(document).on('click', '.delete', function(e){ 
		e.preventDefault();
		//console.log($(this).closest('.particular'));
		$(this).closest('.particular').remove();
	});

	  $('.datepicker').datepicker({ format: 'mmmm dd, yyyy' });

</script>

@endsection