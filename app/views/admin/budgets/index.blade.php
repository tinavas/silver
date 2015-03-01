@extends('template')

@section('head')
{{HTML::style('resources/css/modules/budgets/budget-view.css');}}
@endsection

@section('content')
<div class="row budgets">
    <div class="medium-12 column">
    	<div class="medium-5 column no-padding module-title">
    		<h4><i class="fa fa-money"></i> Budget</h4>
    	</div>
        
        <div class="medium-7 column create-new-container no-padding">
            <a href="{{url('admin/budgets/create')}}" class="small button"><i class="fa fa-plus"></i> Create New User</a>
        </div>

      	<div class="medium-12 column view-box">
			<table class="data-table">
				<thead>
					<th>Project ID</th>
					<th>Amount</th>
					<th>Description</th>
					<th>Remarks</th>
					<th>More Actions</th>
				</thead>
				<tbody>
					<tr>
						<td>1</td>
						<td>1</td>
						<td>1</td>
						<td>1</td>
						<td><a href=""><i class="fa fa-pencil fa-2x"></i></a></td>
					</tr>
				</tbody>
			</table>
      </div>
    </div>
</div>
@endsection