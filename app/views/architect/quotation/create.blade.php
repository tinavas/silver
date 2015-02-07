@extends('template')

@section('head')
{{HTML::style('resources/css/modules/quotation/quotation-create.css');}}
@endsection

@section('content')

<div class="row quotation">
    <div class="medium-10 large-centered column">
      <h4 class="view-header"><i class="fa fa-user"></i> Quotation Information</h4>
      <div class="view-box">
            {{Form::open(array('url' => '/architect/quotation/create/' . $id,'method' => 'POST'))}}
         <div class="row">
             <div class="medium-2 column">
                {{Form::label('title','Title', array('class' => 'inline right'))}}
             </div>
             <div class="medium-10 column">
                  {{Form::text('title','',array('class'=> ''))}}
             </div>
         </div>
         <div class="row">
             <div class="medium-2 column">
                {{Form::label('remarks','Remarks', array('class' => 'inline right'))}}
             </div>
             <div class="medium-10 column">
                {{Form::textarea('remarks','',array('class'=>''))}}
             </div>
         </div>
        <div class="row">
            <div class="medium-12 column">
                {{Form::submit('Create', array('class'=>'right button submit'))}}
                {{Form::close()}}
            </div>
        </div>
    </div>
</div>
@endsection