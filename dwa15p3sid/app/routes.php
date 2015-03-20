<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('index');
});

Route::get('/loremipsum', function() {
   return View::make('loremipsum');	
});

Route::post('/loremipsum', function() {
	$numberOfParagraphs = Input::get('numParagraphs');
	$loremIpsumGenerator = new Badcow\LoremIpsum\Generator();
	$paragraphsStr = $loremIpsumGenerator->getParagraphs($numberOfParagraphs);
	$result = array('numberOfParagraphs'=>$numberOfParagraphs, 'paragraphsStr'=>$paragraphsStr);
    return View::make('loremipsum')->with('result', $result);
});




Route::get('/usergenerator', function() {
   return View::make('usergenerator');	
});

Route::post('/usergenerator', function() {	
	$inputs = Input::all();
	$numberOfUsers = Input::get('users');
	$isBdayRequired = false;
	$isProfileRequired = false;
	foreach($inputs as $key => $value) {
		if ($key == "birthdate")
			$isBdayRequired = true;
		elseif ($key == "profile") 
			$isProfileRequired = true;
	}

	$faker = Faker\Factory::create();
	$result = array('numberOfUsers'=>$numberOfUsers, 'isBdayRequired'=>$isBdayRequired, 'isProfileRequired'=>$isProfileRequired, 'faker'=>$faker);
	return View::make('usergenerator')->with('result', $result);
});
