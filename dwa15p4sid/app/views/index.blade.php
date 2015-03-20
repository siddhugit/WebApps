@extends('_master')

@section('title')
	Welcome to Task Mamanger
@stop

@section('content')
	<br><br>
	<h2>Welcome to Task Manager!</h2>
	@if(Auth::check())
		<ul>
			<li><a href='/listAll'>View all Tasks</a></li><br>
			<li><a href='/listIncomplete'>View Incomplete Tasks</a></li><br>
			<li><a href='/listComplete'>View Completed Tasks</a></li><br>
		</ul>
	@endif

	<br><br>


@stop