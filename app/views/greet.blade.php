@extends('template')

@section('head')
	{{HTML::style('styles/stylesheet.css')}}
@stop

@section('content')
	HEEEEEEEEEEEEYYYYYYYYYYYYYYYYYYYY
	<table>

	<tr>
		<th>ID</th>
		<th>Username</th>
		<th>Password</th>
	</tr>
		
	@foreach($users as $user)
		<tr>
			<td>{{$user->id}}</td>
			<td>{{$user->username}}</td>
			<td>{{$user->password}}</td>
		</tr>
	@endforeach

	</table>
	{{$users->links()}}
@stop