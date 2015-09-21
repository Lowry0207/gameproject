<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
/*
Route::get('/', function () {
    return view('welcome');
});
*/

Route::get('/', 'HomeController@index');

Route::get('/auth/login', 'Auth\AuthController@login');
Route::post('/auth/login', 'Auth\AuthController@authenticate');

Route::get('/auth/logout', function(){
	Auth::logout();
});

#----
#Регистрация
Route::get('/reg', 'Auth\RegController@create');
Route::post('/reg', 'Auth\RegController@store');
#----
# Добавить новую новость
Route::get('/news/add/', 'NewsController@create');
Route::post('/news/store', 'NewsController@store');
#----


#----
#Просмотр всех/ детально новостей
Route::get('/test', 'NewsController@test');
Route::get('/news', 'NewsController@index');
Route::get('/news/{id}', 'NewsController@show');
#----

#----
# Добавить коментарий
Route::post('/news/{id}', 'NewsController@add_comment');

Route::get('profile', ['middleware' => 'auth', function() {
    dd(Auth::user());
}]);

