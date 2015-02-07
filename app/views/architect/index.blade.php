@extends('architecttemplate')

@section('head')
{{HTML::style('resources/css/modules/quotation/quotation-create.css');}}
@endsection

@section('content')
<div class="row quotation">
    <div class="medium-10 large-centered column">
      <h4 class="view-header"><i class="fa fa-user"></i>Your Projects:</h4>
      <div class="view-box">
			@if(count($projects) != 0)
				<table class = "data-table">
					<thead>
						<th>Project ID</th>
						<th>Project Name</th>
						<th>Project Description</th>
						<th>Deadline</th>
						<th>Create Quotation</th>
						<th>View Quotations</th>
					</thead>
					<tbody>
					@foreach($projects as $project)
						<tr>
							<td>{{$project->id}}</td>
							<td>{{$project->title}}</td>
							<td>{{$project->description}}</td>
							<td>{{$project->deadline}}</td>
							<td><a href="{{URL::to('/architect/quotation/create/' . $project->id)}}">Create</a></td>
							<td><a href="">View</a></td>
						</tr>
					@endforeach
					</tbody>
				</table>
			@endif
      </div>
    </div>
</div>
@endsection