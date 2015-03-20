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

// Bind route parameters.
Route::model('task', 'Task');

// Show pages.
Route::get('/listAll', array('before' => 'auth', 'uses' => 'TasksController@listAll'));
Route::get('/listIncomplete', array('before' => 'auth', 'uses' => 'TasksController@listIncomplete'));
Route::get('/listComplete', array('before' => 'auth', 'uses' => 'TasksController@listComplete'));
Route::get('/create', 'TasksController@create');
Route::get('/edit/{task}', 'TasksController@edit');
Route::get('/delete/{task}', 'TasksController@delete');

//post 
Route::post('/create', 'TasksController@createTask');
Route::post('/edit', 'TasksController@editTask');
Route::post('/delete', 'TasksController@deleteTask');

Route::get('/', function()
{
	return View::make('index');
});

Route::get('/signup',
    array(
        'before' => 'guest',
        function() {
            return View::make('signup');
        }
    )
);

Route::post('/signup', 
    array(
        'before' => 'csrf', 
        function() {

        	$data = Input::all();

			// Build the validation constraint set.
        	$rules = array(
			    'username' => 'alpha_num|unique:users,username|required|min:3|max:32',
        		'email' => 'email|required|unique:users,email',
        		'password' => 'required|min:3'
    		);

        	// Create a new validator instance.
    		$validator = Validator::make($data, $rules);

    		if ($validator->passes()) {
	            $user = new User;
				$user->username    = Input::get('username');
	            $user->email    = Input::get('email');
	            $user->password = Hash::make(Input::get('password'));
	            $user->firstname    = Input::get('firstname');
	            $user->lastname    = Input::get('lastname');

	            # Try to add the user 
	            try {
	                $user->save();
	            }
	            # Fail
	            catch (Exception $e) {
	                return Redirect::to('/signup')->with('flash_message', 'Sign up failed; please try again.')->withInput();
	            }

	            # Log the user in
	            Auth::login($user);

	            return Redirect::to('/')->with('flash_message', 'Welcome to Task Master!');
        	}
        	else
        		return Redirect::to('/signup')->withErrors($validator);

        }
    )
);

Route::get('/login',
	array(
		'before' => 'guest',
		function() {
			return View::make('login');
		}
	)
);
Route::post('/login', array('before' => 'csrf', function() {

	$credentials = Input::only('username', 'password');

	$remember = Input::get('remember_token');

	if (Auth::attempt($credentials, $remember = true)) {
		return Redirect::intended('/')->with('flash_message', 'Welcome Back!');
	}
	else {
		return Redirect::to('/login')->with('flash_message', 'Log in failed; please try again.');
	}

	return Redirect::to('login');

}));
Route::get('/logout', function() {
    Auth::logout();
    return Redirect::to('/');
});

Route::get('mysql-test', function() {

    # Use the DB component to select all the databases
    $results = DB::select('SHOW DATABASES;');

    # If the "Pre" package is not installed, you should output using print_r instead
    return Paste\Pre::render($results);

});
