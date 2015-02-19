@extends('architecttemplate')

@section('head')
{{HTML::style('resources/css/modules/quotation/quotation-create.css');}}
@endsection

@section('content')

<div class="row quotation">
    <div class="medium-10 large-centered column">
      <h4 class="view-header"><i class="fa fa-user"></i>Create Quotation Entry</h4>
        @if($errors->has())
            <span class = "error">
                @foreach($errors->all() as $error)
                    {{$error}} <br>
                @endforeach
            </span>
        @endif
      <div class="view-box">
        {{Form::open(array('url' => '/architect/quotation/edit/'))}}
         <div class="row">
             <div class="medium-2 column">
                {{Form::label('description','Description', array('class' => 'inline right'))}}
             </div>
             <div class="medium-10 column">
                  {{Form::text('descripton',null,array('class'=> ''))}}
             </div>
         </div>
         <div class = "row">
            <div class="medium-2 column">
                {{Form::label('type','Type', array('class' => 'inline right'))}}
             </div>
             <div class="medium-10 column">
                  {{Form::select('type',['1' => 'Header', '2' => 'Sub Header', '3' => 'Child'],'1',array('class'=> 'inline right type'))}}
             </div>
         </div>
         <div class = "child-entry">
            <fieldset>
             <legend>Child Entry</legend>
            <div class="row">
                 <div class="medium-2 column">
                    {{Form::label('quantity','Quantity', array('class' => 'inline right'))}}
                 </div>
                 <div class="medium-10 column">
                    {{Form::text('quantity',null,array('class'=>''))}}
                 </div>
             </div>
             <div class="row">
                <div class="medium-2 column">
                    {{Form::label('parent_id','Parent', array('class' => 'inline right'))}}
                 </div>
                 <div class="medium-10 column">
                    {{Form::select('parent_id',$parents,array('class'=>'inline right'))}}
                 </div>
             </div>
             <div class="row">
                <div class="medium-2 column">
                    {{Form::label('unit','Unit', array('class' => 'inline right'))}}
                 </div>
                 <div class="medium-10 column">
                    {{Form::text('unit','')}}
                 </div>
             </div>
             </fieldset>    
         </div>
         <div class="sub-header-entry">
             <fieldset>
                 <legend>Sub Header Entry</legend>
                 <div class="row">
                    <div class="medium-2 column">
                        {{Form::label('parent_id','Parent', array('class' => 'inline right'))}}
                     </div>
                     <div class="medium-10 column">
                        {{Form::select('parent_id',$parents,array('class'=>'inline right'))}}
                     </div>
                 </div>
             </fieldset>
         </div>
        <div class="row">
            <div class="medium-12 column">
                {{Form::submit('Create', array('class'=>'right button submit'))}}
            </div>
        </div>
        {{Form::close()}}
    </div>
</div>
@endsection