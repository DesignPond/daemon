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

Route::get('home', function () {
    return view('welcome');
});

// Site routes...
Route::get('/', ['uses' => 'HomeController@accueil']);
Route::get('accueil', ['uses' => 'HomeController@accueil']);
Route::get('page/{slug}', ['uses' => 'HomeController@page']);
Route::get('contact', ['uses' => 'HomeController@contact']);
Route::post('sendMessage', ['uses' => 'HomeController@sendMessage']);

Route::get('imageJson/{id?}', ['uses' => 'UploadController@imageJson']);
Route::get('fileJson/{id?}', ['uses' => 'UploadController@fileJson']);
Route::get('linkJson/{id?}', ['uses' => 'UploadController@linkJson']);

Route::post('uploadFileRedactor/{id?}', 'UploadController@uploadFileRedactor');
Route::post('uploadRedactor/{id?}', 'UploadController@uploadRedactor');

Route::post('schemas/projet/{id?}', ['uses' => 'SchemaController@schemas']);
Route::resource('schemas', 'SchemaController');

//Route::get('contact', ['uses' => 'PageController@index']);
// Admin routes
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function()
{
    Route::resource('page', 'PageController');
    Route::post('hierarchy', ['uses' => 'PageController@hierarchy']);
    Route::get('build', ['uses' => 'PageController@build']);

    Route::resource('projet', 'ProjetController');

});

//Route::post('box/{id}', ['uses' => 'BoxController@update']);
Route::get('box/projet/{id}', ['uses' => 'BoxController@projet']);
Route::resource('box', 'BoxController');
Route::get('arrow/projet/{id}', ['uses' => 'ArrowController@projet']);
Route::resource('arrow', 'ArrowController');

// Administration routes...
Route::get('admin', [ 'middleware' => 'auth', 'uses' => 'AdminController@index']);

// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

// Password reset link request routes...
Route::get('password/email', 'Auth\PasswordController@getEmail');
Route::post('password/email', 'Auth\PasswordController@postEmail');

// Password reset routes...
Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('password/reset', 'Auth\PasswordController@postReset');

// Test routes for development
Route::get('testing', function()
{

/*    \App\Cours\User\Entities\User::create(array(
        'name'     => 'Célia Huart',
        'email'    => 'celia.huart@unine.ch',
        'password' => Hash::make('methode2015')
    ));*/

});
