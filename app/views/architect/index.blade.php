@extends('architecttemplate')

@section('head')
{{HTML::style('resources/css/modules/quotation/quotation-create.css');}}
@endsection

@section('content')

<section class="row">
    <div class="medium-12 large-centered column">
      <h4 class="view-header"><i class="fa fa-user"></i>Your Projects:</h4>
      <div class="view-box">
			@if(count($projects) != 0)
				<table class = "data-table">
					<thead>
						<th>Project ID</th>
						<th>Project Name</th>
						<th>Project Description</th>
						<th>Create Quotation</th>
						<th>More Details</th>
					</thead>
					<tbody>
					@foreach($projects as $project)
						<tr>
							<td>{{$project->id}}</td>
							<td>{{$project->title}}</td>
							<td>{{$project->description}}</td>
							<td><a href="{{URL::to('/architect/quotation/create/' . $project->id)}}">Create</a></td>
							<td><a href="{{URL::to('/architect/quotation/view-project/' . $project->id)}}">View</a></td>
						</tr>
					@endforeach
					</tbody>
				</table>
			@else
        		<h6>You have do not belong to any project!</h6>
			@endif
      </div>
    </div>
</section>
@endsection