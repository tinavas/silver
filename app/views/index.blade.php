<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Silver Leisure Inc.</title>
</head>
<body>
	<h1>Login</h1>
	{{Form::open(array('url' => '/login'))}}
		{{Form::label('username','Username')}}
		{{Form::text('username')}}
		{{Form::label('password','Password')}}
		{{Form::password('password')}}
		{{Form::submit('Login')}}
	{{Form::close()}}

	@if(Session::has('errorMessage'))
		<span class = "error">{{Session::get('errorMessage')}} </span>
	@endif
</body>
</html>