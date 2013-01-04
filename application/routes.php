<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
*/
 
Route::get('test', array( 'as' => 'test', 'uses' => 'test@index' )  );

Route::get('form', array('as' => 'form', 'uses' => 'form@index' ) );

Route::get('tree', array('as' => 'tree', 'uses' => 'tree@index' ) );

Route::get('/', array('as' => 'homepage',  'uses' => 'home@index' )  );

Route::any('movies/(:num?)', array('as' => 'movies', 'uses' => 'movies@index' ) );

/*
|--------------------------------------------------------------------------
| Application 404 & 500 Error Handlers
|--------------------------------------------------------------------------
*/

Event::listen('404', function()
{
	return Response::error('404');
});

Event::listen('500', function()
{
	return Response::error('500');
});

/*
|--------------------------------------------------------------------------
| Route Filters
|--------------------------------------------------------------------------
*/

Route::filter('before', function()
{
	// Do stuff before every request to your application...
});

Route::filter('after', function($response)
{
	// Do stuff after every request to your application...
});

Route::filter('csrf', function()
{
	if (Request::forged()) return Response::error('500');
});

Route::filter('auth', function()
{
	if (Auth::guest()) return Redirect::to('login');
});

Route::any('update_user', array('as' => 'update_user', 'uses' => 'usersform@index' ) );

Route::any('paintings/(:num?)', array('as' => 'paintings', 'uses' => 'paintings@index' ) ); 

