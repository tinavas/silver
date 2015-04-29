@extends('secretarytemplate')

@section('head')
{{HTML::style('resources/css/modules/users/users-create.css');}}
@endsection

@section('content')

<div class="row">
    <div class="medium-10 large-centered column personal-info-container">
        <h4 class="view-header"><i class="fa fa-user"></i> User Information</h4>
         
             @if($errors->has())
                <span class = "error">
                    @foreach($errors->all() as $error)
                            {{$error}} <br>
                     @endforeach
                </span>
            @endif
        <div class="view-box">
            {{Form::model($user, array('url' => '/secretary/users/' . $user->id,'method' => 'put'))}}
         <div class="row">
             <div class="medium-2 column">
                {{Form::label('lastname','Last Name', array('class' => 'inline right'))}}
             </div>
             
             <div class="medium-10 column">
                  {{Form::text('lastname',$user->last_name,array('class'=> 'lastname'))}}
             </div>
         </div>
         
         <div class="row">
             <div class="medium-2 column">
                 {{Form::label('firstname','First Name', array('class' => 'inline right'))}}
             </div>
             <div class="medium-10 column">
                 {{Form::text('firstname',$user->first_name,array('class'=> 'lastname'))}}
             </div>
         </div>
         <div class="row">
             <div class="medium-2 column">
                 {{Form::label('middlename','Middle Name', array('class' => 'inline right'))}}
             </div>
             <div class="medium-10 column">
                 {{Form::text('middlename',$user->middle_initial,array('class'=> 'lastname'))}}
             </div>
         </div>
         <div class="row">
             <div class="medium-2 column">
                 {{Form::label('gender','Gender', array('class' => 'inline right'))}}
             </div>
             <div class="medium-10 column gender">
                 {{Form::radio('gender','male',false,['id'=>'male', 'checked' => 'true'])}}
                 
                 {{Form::label('male','Male')}}
                 {{Form::radio('gender','female',false,['id'=>'female'])}}
                 
                 
                 {{Form::label('female','Female')}}
             </div>
         </div>
         
         <div class="row">
             <div class="medium-2 column">
                 {{Form::label('contactno','Contact No.', array('class' => 'right'))}}
             </div>
             <div class="medium-10 column">
                 {{Form::text('contactno',$user->contact_number,array('class'=> 'contactno'))}}
             </div>
         </div>
         
         <div class="row">
             <div class="medium-2 column">
                 {{Form::label('address','Address', array('class' => 'inline right'))}}
             </div>
             <div class="medium-10 column">
                 {{Form::text('address',$user->address,array('class'=> 'address'))}}
             </div>
         </div>    
        </div>
         
    </div>

</div>
                 {{Form::submit('Update Information', array('class'=>'right button submit'))}}
            {{Form::close()}} 
@endsection