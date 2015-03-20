<!doctype html>
<html>
<head>

	<title>@yield('title','TaskManager')</title>
	<link rel="stylesheet" href="/styles/taskmanager.css" type="text/css">
	<link rel="stylesheet" href="/styles/style.css" type="text/css">

	@yield('head')

</head>

<body>
	<ul>
			<li id='home_icon'><img src='/images/tm.png' height="25" width="25" align="top" hspace="2px"/><a href='/'>Task Manager</a></li>
			@if(Auth::check())
				<li class='nav_icons'><a href='/logout'>Logout</a>&nbsp;{{ Auth::user()->username; }}</li>
			@else
				<li class='nav_icons'><a href='/signup'>Sign Up</a></li>
				<li class='nav_icons'>|</li>
				<li class='nav_icons'><a href='/login'>Login</a></li>
			@endif
			<li><span id='empty_span'></span></li>
	</ul>

	@if(Session::get('flash_message'))
		<div class='flash-message'>{{ Session::get('flash_message') }}</div>
	@endif

	@yield('content')

	@yield('body')

</body>

</html>