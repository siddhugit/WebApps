@extends('_master')

@section('title')
	Log in
@stop

@section('content')
	<h1>Sign in to Task Manager!</h1>

	{{ Form::open(array('url' => '/login')) }}
	
		{{ Form::label('username', 'User Name') }}
		{{ Form::text('username') }}<br><br>

	    {{ Form::label('password', 'Password') }}
		{{ Form::password('password') }}<br><br>

	    {{ Form::label('remember_token', 'Remember Me') }}
		{{Form::checkbox('remember_token', '1') }} <br><br>

		{{ Form::submit('Submit') }}

	{{ Form::close() }}

@stop