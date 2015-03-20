@extends('_master')

@section('title')
	DWA15 P3 Lorem Ipsum Generator
@stop

@section('content')
	<div class="container">
		<a href='/'>&larr; Home</a>
		<h1>Lorem Ipsum Generator</h1>

		How many paragraphs do you want?

		<form method='POST'>	
			<label for="paragraphs">Paragraphs</label>
				@if(isset($result))			
					<input maxlength="2" name="numParagraphs" type="text" value={{$result['numberOfParagraphs']}} id="paragraphs"> (Max: 99)
				@else
					<input maxlength="2" name="numParagraphs" type="text" value="5" id="paragraphs"> (Max: 99)

				@endif	

			<br><br>

			<input type="submit" value="Generate!">    
    	</form>

	</div>

	<div class="paragraphs-output"> 

		@if(isset($result))
				@foreach($result['paragraphsStr'] as $paragraph)
					<p>
						{{$paragraph}}
					</p>
				@endforeach
		@endif
	</div>
@stop