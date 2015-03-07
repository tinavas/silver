@extends('architecttemplate')

@section('head')
{{HTML::style('resources/css/modules/quotation/quotation-create.css');}}
@endsection

@section('content')
<div class="row quotation">
    <div class="medium-10 large-centered column">
     <h4 class="view-header"><i class="fa fa-building"></i>Approve/Disapprove Quotations</h4>
      <div class="view-box">
      @if(Session::has('notification'))
        <span class="alert-box">{{Session::get('notification')}}</span>
      @endif
        @if(!is_null($quotations))
          <table class = "data-table">
            <thead>
              <tr>
                <th>Quotation Title</th>
                <th>Author</th>
                <th>Project Name</th>
                <th>View Entries</th>
                <th>Approve</th>
                <th>Disapprove</th>
              </tr>
            </thead>
            <tbody>
              @foreach($quotations as $quotation)
                <tr>
                  <td>{{$quotation->title}}</td>
                  <td>{{$quotation->user()->first()->last_name . ', ' . $quotation->user()->first()->first_name}}</td>
                  <td>{{$quotation->project()->first()->title}}</td>
                  <td><a href="{{URL::to('/architect/viewer/view-other/' . $quotation->id)}}">View</a></td>
                  <td><a href="{{URL::to('/architect/viewer/approve/' . $quotation->id)}}">Approve</a></td>
                  <td><a href="{{URL::to('/architect/viewer/disapprove/' . $quotation->id)}}">Disapprove</a></td>
                </tr>
              @endforeach
            </tbody>
          </table>
          @else
            <h1>No Quotations for Approval!</h1>
          @endif
        </div>
      </div>
    </div>
</div>
@endsection