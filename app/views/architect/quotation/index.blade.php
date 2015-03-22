@extends('architecttemplate')

@section('head')
{{HTML::style('resources/css/modules/quotation/quotation-create.css');}}
@endsection

@section('content')
<div class="row quotation">
    <div class="medium-10 large-centered column">
      <h4 class="view-header"><i class="fa fa-user"></i>Your Quotations:</h4>
      <div class="view-box">
      @if(count($quotations) != 0)
        <table class = "data-table">
          <thead>
            <th>Quotation ID</th>
            <th>Quotation Title</th>
            <th>Project</th>
            <th>Date Created</th>
            <th>Date Updated</th>
            <th>More Details</th>
            <th>Edit</th>
          </thead>
          <tbody>
          @foreach($quotations as $quotation)
            <tr>
              <td>{{str_pad($quotation->project()->first()->id, 3, "0", STR_PAD_LEFT) . '-'. str_pad($quotation->quotation_code, 3, "0", STR_PAD_LEFT)}}</td>
              <td>{{$quotation->title}}</td>
              <td>{{$quotation->project()->first()->title}}</td>
              <td>{{date('F j, Y',strtotime($quotation->created_at))}}</td>
              <td>{{date('F j, Y',strtotime($quotation->updated_at))}}</td>
              <td><a href="{{URL::to('/architect/quotation/view/' . $quotation->id)}}">View</a></td>
              <td><a href="{{URL::to('/architect/quotation/edit/' . $quotation->id)}}">Edit</a></td>
            </tr>
          @endforeach
          </tbody>
        </table>
      @else
        <h6>You have no quotations contributed!</h6>
      @endif
      </div>
    </div>
</div>
@endsection