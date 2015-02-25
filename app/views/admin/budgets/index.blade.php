@extends('architecttemplate')

@section('head')
{{HTML::style('resources/css/modules/quotation/quotation-create.css');}}
@endsection

@section('content')
<div class="row quotation">
    <div class="medium-10 large-centered column">
      <h4 class="view-header"><i class="fa fa-money"></i>Budget</h4>
      <div class="view-box">
		<table class = "data-table">
			<thead>
				<th>Project ID</th>
				<th>Amount</th>
				<th>Description</th>
				<th>Remarks</th>
				<th colspan="2">More Details</th>
			</thead>
			<tbody>
				<tr>
					<td>1</td>
					<td>1</td>
					<td>1</td>
					<td>1</td>
					<td><a href=""><i class="fa fa-pencil fa-2x"></i></a></td>
					<td><a href=""><i class="fa fa-eye fa-2x"></i></a></td>
				</tr>
			</tbody>
		</table>
      </div>
    </div>
</div>
@endsection