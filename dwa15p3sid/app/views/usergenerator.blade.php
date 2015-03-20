@extends('_master')


@section('head')
@stop

@section('title')
	DW15 P3 User Generator
@stop



@section('content')

	<div class="container">
		<a href='/'>&larr; Home</a>
		<h1>User Generator</h1>


		<form method='POST'>	
			<label for="users">How many users?</label>		


			@if(isset($result))			
				<input maxlength="2" name="users" type="text" value={{$result['numberOfUsers']}} id="users"> (Max: 99)
			@else
				<input maxlength="2" name="users" type="text" value="5" id="users"> (Max: 99)

			@endif	

			<br>
				Include...
			<br>
			@if(isset($result))	
				@if($result['isBdayRequired'])
					<input name="birthdate" type="checkbox" checked="checked">
				@else
					<input name="birthdate" type="checkbox">
				@endif
				<label for="birthdate">Birthdate</label>		<br>
				@if($result['isProfileRequired'])
					<input name="profile" type="checkbox" checked="checked">
				@else
					<input name="profile" type="checkbox">
				@endif
				<label for="profile">Profile</label>		<br>
			@else
				<input name="birthdate" type="checkbox">
				<label for="birthdate">Birthdate</label>		<br>
				<input name="profile" type="checkbox">
				<label for="profile">Profile</label>		<br>
			@endif		
			<input type="submit" value="Generate!">    
    	</form>

	</div>


	<div class="container"> 

		@if(isset($result))
				@for ($i = 1; $i <= $result['numberOfUsers']; $i++)
	     				<br> {{$result['faker']->name}} <br>
	     				@if($result['isBdayRequired'])
	     					{{$result['faker']->dateTimeThisCentury->format('m-d-Y')}} <br>
     					@endif
     					@if($result['isProfileRequired'])
	     					{{$result['faker']->text(100)}} <br>  
     					@endif
						
				@endfor
		@endif
	</div>

@stop