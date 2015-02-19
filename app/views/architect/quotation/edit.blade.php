@extends('architecttemplate')

@section('head')
{{HTML::style('resources/css/modules/quotation/quotation-create.css');}}
@endsection

@section('content')

<div class="row quotation">
    <div class="medium-10 large-centered column">
      <h4 class="view-header"><i class="fa fa-user"></i> Quotation Information</h4>
        @if($errors->has())
            <span class = "error">
                @foreach($errors->all() as $error)
                    {{$error}} <br>
                @endforeach
            </span>
        @endif
      <div class="view-box">
            {{Form::model($quotation,array('url' => '/architect/quotation/edit/' . $quotation->id))}}
         <div class="row">
             <div class="medium-2 column">
                {{Form::label('title','Title', array('class' => 'inline right'))}}
             </div>
             <div class="medium-10 column">
                  {{Form::text('title',null,array('class'=> ''))}}
             </div>
         </div>
         <div class="row">
             <div class="medium-2 column">
                {{Form::label('remarks','Remarks', array('class' => 'inline right'))}}
             </div>
             <div class="medium-10 column">
                {{Form::textarea('remarks',null,array('class'=>''))}}
             </div>
         </div>
        <div class="row">
            <div class="medium-12 column">
                {{Form::submit('Update', array('class'=>'right button submit'))}}
                {{Form::close()}}
            </div>
        </div>
    </div>
</div>
@endsection