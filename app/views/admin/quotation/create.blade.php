@extends('template')

@section('head')
{{HTML::style('resources/css/modules/quotation/quotation-create.css');}}
@endsection

@section('content')

<div class="row quotation">
    <div class="medium-10 large-centered column">
      <h4 class="view-header"><i class="fa fa-user"></i> Quotation Information</h4>

      <div class="view-box">
            {{Form::open(array('url' => '','method' => 'POST'))}}
         <div class="row">
             <div class="medium-2 column">
                {{Form::label('subject','Subject', array('class' => 'inline right'))}}
             </div>
             
             <div class="medium-10 column">
                  {{Form::text('subject','',array('class'=> ''))}}
             </div>
         </div>
         <div class="row">
             <div class="medium-2 column">
                {{Form::label('attach','Attach File', array('class' => 'inline right'))}}
             </div>
             <div class="medium-10 column">
                {{Form::file('quotationfile','',array('class'=>''))}}
             </div>
         </div>
    </div>
</div>
@endsection