@extends('template')

@section('head')
{{HTML::style('resources/css/modules/projects/projects-create.css');}}
@endsection

@section('content')


<div class="row">
    <div class="medium-10 large-centered column personal-info-container">
        <h4 class="view-header"><i class="fa fa-building"></i> Project Information</h4>

        @if($errors->has())
            <span class = "error">
                @foreach($errors->all() as $error)
                        {{$error}} <br>
                 @endforeach
            </span>
        @endif

        <div class="view-box">
            {{Form::open(array('url' => '/admin/projects','method' => 'POST'))}}
         <div class="row">
             <div class="medium-2 column">
                {{Form::label('code','Code', array('class' => 'inline right'))}}
             </div>
             
             <div class="medium-10 column">
                  {{Form::text('code','',array('class'=> 'lastname'))}}
             </div>
         </div>
         
         <div class="row">
             <div class="medium-2 column">
                 {{Form::label('title','Title', array('class' => 'inline right'))}}
             </div>
             <div class="medium-10 column">
                 {{Form::text('title','',array('class'=> 'lastname'))}}
             </div>
         </div>
         <div class="row">
             <div class="medium-2 column">
                 {{Form::label('description','Description', array('class' => 'inline right'))}}
             </div>
             <div class="medium-10 column">
                 {{Form::text('description','',array('class'=> 'lastname'))}}
             </div>
         </div>
         <div class="row">
             <div class="medium-2 column">
                 {{Form::label('location','Location', array('class' => 'inline right'))}}
             </div>
             <div class="medium-10 column">
                 {{Form::text('location','',array('class'=> 'lastname'))}}
             </div>
         </div>
         
         <div class="row">
             <div class="medium-2 column">
                 {{Form::label('budget','Budget', array('class' => 'inline right'))}}
             </div>
             <div class="medium-10 column">
                 {{Form::text('budget','',array('class'=> 'lastname'))}}
             </div>
         </div>
         
         <div class="row">
             <div class="medium-2 column">
                 {{Form::label('deadline','Deadline', array('class' => 'inline right'))}}
             </div>
             <div class="medium-10 column">
                 {{Form::input('date','deadline','', array('class'=>'lastname datepicker'))}}
             </div>
         </div>    
        </div>
         
    </div>

</div>
<div class="row">
    <div class="medium-10 large-centered column account-info-container"> 
        {{Form::submit('Create New Project', array('class'=>'right button submit'))}}
        {{Form::close()}} 
    </div>
</div>

@endsection