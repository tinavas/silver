@extends('architecttemplate')

@section('head')
{{HTML::style('resources/css/modules/quotation/quotation-create.css');}}
@endsection

@section('content')
<div class="row quotation">
    <div class="medium-10 large-centered column">
     <h4 class="view-header"><i class="fa fa-building"></i>Approve/Disapprove Quotations</h4>
      <div class="view-box">
        @if(!is_null($quotations))
          <table class = "data-table">
            <thead>
              <tr>
                <td>Quotation Title</td>
                <td>Author</td>
                <td>View</td>
                <td>Actions</td>
              </tr>
            </thead>
            <tbody>
              @foreach($quotations as $quotation)
                <tr>
                  <td>{{$quotation->title}}</td>
                  <td>{{$quotation->user()->first()->last_name . ', ' . $quotation->user()->first()->first_name}}</td>
                  <td><a href="#">View</a></td>
                  <td><a href="#">Approve</a></td>
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