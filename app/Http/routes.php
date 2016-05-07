<?php

/*
|--------------------------------------------------------------------------
| Frontend Routes
|--------------------------------------------------------------------------
*/

Route::get('/', ['uses' => 'HomeController@accueil']);
Route::get('accueil', ['uses' => 'HomeController@accueil']);
Route::get('page/{slug}', ['uses' => 'HomeController@page']);
Route::get('subpage', ['uses' => 'HomeController@subpage']);
Route::get('contact', ['uses' => 'HomeController@contact']);

Route::post('sendMessage', ['uses' => 'HomeController@sendMessage']);
Route::post('search', ['uses' => 'SearchController@search']);

Route::get('imageJson/{id?}', ['uses' => 'Backend\UploadController@imageJson']);
Route::get('fileJson/{id?}', ['uses' => 'Backend\UploadController@fileJson']);

Route::post('uploadFileRedactor/{id?}', 'Backend\UploadController@uploadFileRedactor');
Route::post('uploadRedactor/{id?}', 'Backend\UploadController@uploadRedactor');

Route::resource('page', 'PageController');

/*
|--------------------------------------------------------------------------
| Backend Routes
|--------------------------------------------------------------------------
*/

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function()
{
    Route::get('/', [ 'middleware' => 'auth', 'uses' => 'Backend\AdminController@index']);

    Route::resource('page', 'Backend\PageController');
    Route::resource('glossaire', 'Backend\GlossaireController');
    Route::post('hierarchy', ['uses' => 'Backend\PageController@hierarchy']);
    Route::get('build', ['uses' => 'Backend\PageController@build']);
    Route::resource('config', 'Backend\ConfigController');
    Route::resource('site', 'Backend\SiteController');

});

// Authentication routes...
Route::get('auth/student', 'Auth\AuthController@getStudent');
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

/*
    \App\Cours\User\Entities\User::create(array(
        'name'     => 'Etudiant',
        'email'    => 'info@methodologie.ch',
        'password' => Hash::make('mj2015')
    ));
 */

    $model = new \App\Cours\Page\Entities\Page();

    $pages = [

        ['id' => 1, 'template' => 'accueil', 'slug' => 'accueil',     'title' => 'Accueil',      'content' => '<p>content</p>'],
        ['id' => 2, 'template' => 'contact', 'slug' => 'contact',     'title' => 'Contact',      'content' => '<p>content</p>'],
        ['id' => 3, 'template' => 'page', 'slug' => 'colloque',    'title' => 'Colloques',    'content' => '<p>content</p>'],
        ['id' => 4, 'template' => 'page', 'slug' => 'inscription', 'title' => 'Inscriptions', 'content' => '<p>content</p>'],
        ['id' => 5, 'template' => 'page', 'slug' => 'user',        'title' => 'Utilisateurs', 'content' => '<p>content</p>',
            'children' => [
                    ['id' => 6, 'template' => 'page', 'slug' => 'account', 'title' => 'Comptes'],
                    ['id' => 7, 'template' => 'page', 'slug' => 'adresse', 'title' => 'Adresses'],
                    ['id' => 8, 'template' => 'page', 'slug' => 'specialisation', 'title' => 'Spécialisations']
            ]
        ],
        ['id' => 9, 'template' => 'page', 'slug' => 'shop', 'title' => 'Shop', 'content' => '<p>content</p>']
    ];

    $model->buildTree($pages);

});
