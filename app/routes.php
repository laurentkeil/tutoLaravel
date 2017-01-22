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
	return View::make('hello')->with('message', 'Vous y êtes !');
});

//Route::get('{n}', function($n) { return 'Je suis la page ' . $n . ' !'; });

App::missing(function()
{
  return 'Je ne connais pas cette page !';
});

//Route::get('/2', 'HomeController@showWelcome');
Route::get('/2', 'HomeController@index');


/*Route::get('article/{n}', function($n) { 
    return View::make('article')->with('numero', $n); 
})->where('n', '[0-9]+');*/


Route::get('article/{n}', 'ArticleController@show')
->where('n', '[0-9]+');


Route::get('facture/{n}', function($n) { 
    return View::make('factures')->with('numero', $n);
})->where('id', '[0-9]+');


/*Route::get('users', 'UsersController@getInfos');
Route::post('users', 'UsersController@postInfos');*/
//Restful
/*Route::controller('users', 'UsersController');
Route::post('users', array(
    'before' => 'csrf', 
	'uses' => 'UsersController@postInfos'
));*/

Route::controller('contact', 'ContactController');

Route::controller('photo', 'PhotoController');

Route::controller('email', 'EmailController');

Route::resource('user', 'UserController');

Route::filter('auth', function()
{
    if (Auth::guest()) return Redirect::guest('auth/login');
});

Route::controller('auth', 'AuthController');

Route::controller('password', 'RemindersController');

Route::controller('post', 'PostController');


Route::get('/ajaxxml', function()
{
	return View::make('ajax/vue1');
});

Route::get('/ajaxdsl', function()
{
	return View::make('ajax/vue2');
});

Route::get('/ajaxAC', function()
{
	return View::make('ajax/autocomplete');
});