<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Silver Leisure Inc.</title>
<link href='http://fonts.googleapis.com/css?family=Noto+Sans' rel='stylesheet' type='text/css'>	{{HTML::style('resources/libraries/foundation5.4.7/css/foundation.min.css');}}
{{HTML::style('resources/css/modules/login.css');}}
{{HTML::style('resources/css/common.css');}}
</head>
<body>
  
  <div class="row">
      <div class="medium-12 column logo-container">
       {{HTML::image('resources/images/logo.png', 'Silver Design', array('class' => 'logo'))}}
   </div>
  </div>
   
    <div class="row">
        <div class="medium-5 column large-centered form-container">
          {{Form::open(array('url' => '/login'))}}
		    {{Form::label('username','Username')}}
		    {{Form::text('username','',array('class'=> 'username'))}}
		    {{Form::label('password','Password')}}
 {{Form::password('password','',array('class'=>'password'))}}
		    {{Form::submit('LOGIN', array('class'=>'expand button'))}}
	       {{Form::close()}} 
	       
        @if(Session::has('errorMessage'))
            <span class = "error">
                {{Session::get('errorMessage')}}
            </span>
        @endif 
    </div>
    </div>
    
	

	
</body>
</html>