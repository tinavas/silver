@extends('architecttemplate')

@section('head')
{{HTML::style('resources/css/modules/quotation/quotation-create.css');}}
@endsection

@section('content')

<div class="row quotation">
    <div class="medium-10 large-centered column">
      <h4 class="view-header"><i class="fa fa-book"></i> Quotation Information</h4>
        @if($errors->has())
            <span class = "error">
                @foreach($errors->all() as $error)
                    {{$error}} <br>
                @endforeach
            </span>
        @endif
      <div class="view-box">
            <h3>Creating Quotation for Project : {{$name}}</h3>
            {{Form::open(array('url' => '/architect/quotation/create/' . $id,'method' => 'POST'))}}
         <div class="row">
             <div class="medium-2 column">
                {{Form::label('title','Subject', array('class' => 'inline right'))}}
             </div>
             <div class="medium-10 column">
                  {{Form::text('title','',array('class'=> 'inline right'))}}
             </div>
         </div>
         <div class="row">
             <div class="medium-2 column">
                {{Form::label('remarks','Remarks', array('class' => 'inline right'))}}
             </div>
             <div class="medium-10 column">
                {{Form::text('remarks','',array('class'=>'inline right'))}}
             </div>
         </div>

         <div class = "row">
            <div>
                <div class="medium-2 column">
                    {{Form::label('type','Type', array('class' => 'inline right'))}}
                </div>
                <div class="medium-9 column">
                    {{Form::select('type',['0' => 'Normal', '1' => 'Revision', '2' => 'Additional'],'',['class'=>'inline right'])}}
                </div>
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