@extends('layouts.app')
@section('pagename', 'Reports List')


@section('content')

<div class="col-md-12">
	<div class="card card-plain">
    	<div class="card-header card-header-primary">
	      	<a href="{{ url('dashboard/reports/create') }}"><i class="material-icons pull-right" style="font-size: 40px">add</i></a>
      		<h4 class="card-title mt-0"> Reports List</h4>
	      	<p class="card-category"> Here are the reports list. To add new on list, click the Plus icon.</p>
	    </div>
	    <div class="card-body">
	      	<div class="table-responsive">
	       		<table class="table table-hover">
		          	<thead class="">
			            <th>#</th>
			            <th>Submitted by</th>
			            <th>Average</th>
			            <th>Action</th>
					</thead>
		          	<tbody>
		          		@php $count = 1 @endphp
		          		@foreach($reports as $report)
			            <tr>
			              <td>{{ $count }}</td>
			              <td>{{ $report->user['name'] }}</td>
			              <td>{{ $report->average }}%</td>
			              <td>
							  <div class="timeline-footer">

							    <a href="{{ route('reports.show', $report->id) }}"><i class="material-icons" style="color: #ccc" title="view">remove_red_eye</i></a>
							    <a href="{{ url('reports/download/'.$report->id) }}"><i class="material-icons" style="color: #ef8706" title="download" >cloud_download</i></a>
							    {!! Form::model($report ,['route' => ['reports.destroy', $report->id], 'method' => 'DELETE', 'style' => 'display: inline-block', 'class' => 'form-inline form-delete']) !!}
							    <a href="#/"><i class="material-icons delete" style="color: red" title="delete">delete</i></a>
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
