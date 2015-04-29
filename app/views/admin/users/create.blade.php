@extends('template')

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
            {{Form::open(array('url' => '/admin/users','method' => 'POST'))}}
         <div class="row">
             <div class="medium-2 column">
                {{Form::label('lastname','Last Name', array('class' => 'inline right'))}}
             </div>
             
             <div class="medium-10 column">
                  {{Form::text('lastname','',array('class'=> 'lastname'))}}
             </div>
         </div>
         
         <div class="row">
             <div class="medium-2 column">
                 {{Form::label('firstname','First Name', array('class' => 'inline right'))}}
             </div>
             <div class="medium-10 column">
                 {{Form::text('firstname','',array('class'=> 'lastname'))}}
             </div>
         </div>
         <div class="row">
             <div class="medium-2 column">
                 {{Form::label('middlename','Middle Name', array('class' => 'inline right'))}}
             </div>
             <div class="medium-10 column">
                 {{Form::text('middlename','',array('class'=> 'lastname'))}}
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
                 {{Form::text('contactno','',array('class'=> 'contactno'))}}
             </div>
         </div>
         
         <div class="row">
             <div class="medium-2 column">
                 {{Form::label('address','Address', array('class' => 'inline right'))}}
             </div>
             <div class="medium-10 column">
                 {{Form::text('address','',array('class'=> 'address'))}}
             </div>
         </div>    
        </div>
         
    </div>

</div>

<div class="row">
    <div class="medium-10 large-centered column account-info-container">
        <h4 class="view-header"><i class="fa fa-lock"></i> Account Information</h4>
         <div class="view-box">
             <div class="row">
             <div class="medium-2 column">
                {{Form::label('role','User Type', array('class' => 'inline right'))}}
             </div>
             
             <div class="medium-10 column">
                 {{ Form::select('role', ['Administrator', 'Architect','Secretary']) }}
             </div>
         </div>
         
         <div class="row">
             <div class="medium-2 column">
                 {{Form::label('email','Email', array('class' => 'inline right'))}}
             </div>
             <div class="medium-10 column">
                 {{Form::email('email','',array('class'=> 'email'))}}
             </div>
         </div>
         <div class="row">
             <div class="medium-2 column">
                 {{Form::label('password','Passsword', array('class' => 'inline right'))}}
             </div>
             <div class="medium-10 column">
                 {{Form::password('password','',array('class'=> 'password'))}}
             </div>
         </div>
         
        <div class="row">
             <div class="medium-2 column">
                 {{Form::label('password_confirmation','Repeat Passsword', array('class' => 'inline right'))}}
             </div>
             <div class="medium-10 column">
                 {{Form::password('password_confirmation','',array('class'=> 'rppassword'))}}
             </div>
         </div>
         </div>
         
         
        {{Form::submit('Create New User', array('class'=>'right button submit'))}}
	       {{Form::close()}} 
    </div>
</div>
@endsection