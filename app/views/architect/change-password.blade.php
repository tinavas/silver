@extends('architecttemplate')

@section('head')
{{HTML::style('resources/css/modules/budgets/budget-view.css');}}
@endsection

@section('content')
<div class="row budgets">
    <div class="medium-12 column">
      <div class="medium-5 column no-padding module-title">
        <h4><i class="fa fa-gears"></i>Change Password</h4>
      </div>
    
        <div class="medium-12 column view-box">
         @if($errors->has())
            <span class = "error">
            @foreach($errors->all() as $error)
                {{$error}} <br>
            @endforeach
            </span>
        @endif
        {{Form::open(['url' => '/architect/change-password/'])}}
          {{Form::label('password','Current Password')}}
          {{Form::password('password')}}

          {{Form::label('password','New Password')}}
          {{Form::password('new_password')}}

          {{Form::label('password','Current Password')}}
          {{Form::password('new_password_confirmation')}}

          {{Form::submit('Update',['class' => 'button'])}}
        {{Form::close()}}
        </div>
    </div>
</div>
@endsection