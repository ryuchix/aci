@extends('layouts.app')
@section('pagename', 'Show Report')


@section('content')


<div class="col-md-12">
	<div class="card card-plain">
    	<div class="card-header card-header-primary">
      		<h4 class="card-title mt-0">{{ $user->name }}</h4>
	      	<p class="card-category">{{ $date }}</p>
	    </div>
	    <div class="card-body">
	      	<div class="table-responsive">
	       		<table class="table table-hover">
		          	<thead class="">
			            <th>#</th>
			            <th>Particular</th>
			            <th>Percentage</th>
			            <th>Remarks</th>
					</thead>
		          	<tbody>
		          		@php $count = 1 @endphp
		          		@foreach($particulars as $particular)
			            <tr>
			              <td>{{ $count }}</td>
			              <td>{{ $particular->particular }}</td>
			              <td>{{ $particular->percentage }}%</td>
			              <td>{{ $particular->remarks }}</td>
			            </tr>
			            @php $count ++ @endphp
			            @endforeach
		          	</tbody>
		        </table>
		        <div class="pull-left"><h3>Average: <b>{{ $report->average }}%</b></h3></div>
	      	</div>
	    </div>



  	</div>
</div>

@include('error.error')
@include('message.message')

@endsection
