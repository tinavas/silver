<?php $total = 0; ?>
@extends('template')

@section('head')
{{HTML::style('resources/css/modules/datatable.css');}}
{{HTML::style('resources/css/modules/budgets/budget-view.css');}}
@endsection

@section('content')
<div class="row budgets">
    <div class="medium-12 column">
    	<div class="medium-5 column no-padding module-title">
    		<h4><i class="fa fa-money"></i> Budget</h4>
    	</div>
        
        <div class="medium-7 column create-new-container no-padding">
            <a href="{{url('admin/budget/create/' . $project->id)}}" class="small button"><i class="fa fa-plus"></i> Add New Entry</a>
        </div>
		
      	<div class="medium-12 column view-box">
      	<h1>Budget Information for: {{$project->title}}</h1>
	        @if(count($budgets))
				<table class="data-table">
					<thead>
						<th>ID</th>
						<th>Description</th>
						<th>Remarks</th>
						<th>Total</th>
						<th>Delete</th>
					</thead>
					<tbody>
						@foreach($budgets as $budget)
							<tr>
								<td>{{$budget->id}}</td>
								<td>{{$budget->description}}</td>
								<td>{{$budget->remarks}}</td>
								<td>{{number_format($budget->amount,2)}}</td>
								<td><a href="{{URL::to('/admin/budget/delete/' . $budget->id)}}">Delete</a></td>
								<?php $total += $budget->amount ?>
							</tr>
						@endforeach
					</tbody>
				</table>
				<h6>Total: {{number_format($total,2)}}</h6>
			@else
				<h3>No Budget Entries Yet!</h3>
	        @endif
      </div>
    </div>
</div>
@endsection