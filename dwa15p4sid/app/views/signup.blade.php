@extends('_master')

@section('title')
	Sign up
@stop

@section('content')

	<h1>Sign in to Task Manager!</h1>

	{{ Form::open(array('url' => '/signup')) }}
	
		{{ Form::label('username', 'User Name') }}
		{{ Form::text('username') }}<br><br>

		{{ Form::label('firstname', 'First Name') }}
		{{ Form::text('firstname') }}<br><br>

		{{ Form::label('lastname', 'Last Name') }}
		{{ Form::text('lastname') }}<br><br>

	    {{ Form::label('email', 'Email address') }}
		{{ Form::text('email') }}
		{{ $errors->first('email', '<span class="error">:message</span>') }}<br><br>

	    {{ Form::label('password', 'Password') }}
		{{ Form::password('password') }}
		{{ $errors->first('password', '<span class="error">:message</span>') }}<br><br>

		{{ Form::submit('Submit') }}

	{{ Form::close() }}

@stop