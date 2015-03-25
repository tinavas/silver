@extends('template')
@section('head')
{{HTML::style('resources/css/modules/projects/projects-view.css');}}
@endsection

@section('content')
    <section class="projects">
    <div class="row">
      <div class="medium-12 column">
        <h4 class="view-header"><i class="fa fa-wrench"></i> Materials Management</h4>
        <div class="medium-12 column view-box">
        <h5>Budget Module for Quotation: {{$quotation->title}}</h5>
        <a href="#" data-reveal-id = "addModal" class = "button"><i class = "fa fa-plus"></i>Add New Entry</a>
        @if($errors->has())
            <span class = "error">
                @foreach($errors->all() as $error)
                        {{$error}} <br>
                 @endforeach
            </span>
        @endif
            <table class = "data-table">
                  <thead>
                    <tr>
                      <th>Entry</th>
                      <th>Date</th>
                      <th>Remarks</th>
                      <th>Unit Price</th>
                      <th>Quantity</th>
                      <th>Amount</th>
                      <th>Quotation Amount</th>
                      <th>Delete</th>
                    </tr>
                  </thead>
                  <tbody>
                   @foreach($budgets as $budget)
                    <tr>
                      <td>{{$budget->entry()->first()->description}}</td>
                      <td>{{$budget->created_at}}</td>
                      <td>{{$budget->remarks}}</td>
                      <td>{{number_format($budget->unit_price,2)}}</td>
                      <td>{{$budget->quantity}}</td>
                      <td>{{number_format($budget->amount,2)}}</td>
                      <td>{{number_format($budget->entry()->first()->tm,2)}}</td>
                      <td><a href="{{URL::to('/admin/materials/delete/' . $budget->id)}}">Delete</a></td>
                    </tr>
                   @endforeach
                  </tbody>
            </table>
            <h4>{{'Total Amount of Materials In Quotation: ' . number_format($totalTm,2)}}</h4>
            <h4>{{'Total Amount Allocated: ' . number_format($totalAmount,2)}}</h4>
        </div>
      </div>
    </div>
    <div id = "addModal" data-reveal class = "reveal-modal">
      <h1>Add New Entry</h1>
        {{Form::open(['url' => '/admin/materials/add/' . $quotation->id ])}}
          {{Form::label('entry_id','Entry')}}
          {{Form::select('entry_id',$items)}}
          
          {{Form::label('unit_price','Unit Price')}}
          {{Form::text('unit_price','')}}
          
          {{Form::label('quantity','Quantity')}}
          {{Form::text('quantity')}}

          {{Form::label('remarks','Remarks')}}
          {{Form::text('remarks')}}

          {{Form::submit('Submit',['class' => 'button right'])}}
        {{Form::close()}}
    </div>
  </section>
@endsection