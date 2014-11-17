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
Route::controller('password', 'RemindersController');

Route::get('script',function(){

	return Redirect::to('install/index.php');
});

Route::get('{my?}','SnipperController@show')->where('my','my');

Route::get('{id?}','SnipperController@userSnippets')->where('id','[0-9]+');

Route::controller('admin','AdminController');
//Route::any('admin/{query?}',array('before'=>'auth','uses' => 'AdminController@request'));

Route::post('create','SnipperController@create');

Route::get('delete/{query}','SnipperController@delete');

Route::get('logout',function(){
		Auth::logout();
		if(Input::has('adminred'))
			return Redirect::to('login')->withMessage('Successfully logged out!');
		else
			return Redirect::to('../');
});


Route::get('login',function(){
	return View::make('login');
});
Route::controller('user','UserController');
// Route::get('ctadmin',function()
// {
// 	$user = new User;
// 	$user->name = 'Admin';
// 	$user->email = 'admin@admin.com';
// 	$user->password = Hash::make('12345');
//	$user->power = 1;
// 	$user->save();
// });
Route::post('login','UserController@adminLogin');

Route::post('register','UserController@register');

Route::get('{query}/','SnipperController@viewSnippet');

Route::get('search/{query}','SnipperController@search');
Route::get('install/final',function(){
	return install::ins();
	
});
