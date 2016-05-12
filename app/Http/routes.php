<?php

/*
|--------------------------------------------------------------------------
| Frontend Routes
|--------------------------------------------------------------------------
*/

Route::get('/', ['uses' => 'HomeController@accueil']);
Route::get('accueil', ['uses' => 'HomeController@accueil']);

Route::group(['middleware' => 'auth'], function()
{
    Route::get('page/{slug}', ['uses' => 'HomeController@page']);
});

Route::get('site/{id}', ['uses' => 'HomeController@site']);
Route::get('contact', ['uses' => 'HomeController@contact']);

Route::post('sendMessage', ['uses' => 'HomeController@sendMessage']);
Route::post('search', ['uses' => 'SearchController@search']);

Route::get('imageJson/{id?}', ['uses' => 'Backend\UploadController@imageJson']);
Route::get('fileJson/{id?}', ['uses' => 'Backend\UploadController@fileJson']);

Route::post('uploadFileRedactor/{id?}', 'Backend\UploadController@uploadFileRedactor');
Route::post('uploadRedactor/{id?}', 'Backend\UploadController@uploadRedactor');

Route::resource('page', 'PageController');


// Tickets upload
Route::get('frontendUploadJson/{id?}',['uses' => 'Helpdesk\Frontend\UploadController@uploadJson']);
Route::get('frontendFileJson/{id?}',  ['uses' => 'Helpdesk\Frontend\UploadController@fileJson']);

Route::post('uploadImage', 'Helpdesk\Frontend\UploadController@uploadImage');
Route::post('uploadFile', 'Helpdesk\Frontend\UploadController@uploadFile');

Route::get('ticket/complete', ['uses' => 'Helpdesk\Frontend\HelpdeskController@complete']);
Route::resource('ticket', 'Helpdesk\Frontend\HelpdeskController');
Route::resource('comment', 'Helpdesk\Frontend\CommentController');

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

    // Helpdesk
    Route::resource('ticket', 'Helpdesk\Backend\TicketController');
    Route::resource('priority', 'Helpdesk\Backend\PriorityController');
    Route::resource('status', 'Helpdesk\Backend\StatusController');
    Route::resource('comment', 'Helpdesk\Backend\CommentController');
    Route::resource('categorie', 'Helpdesk\Backend\CategoryController');

});


// oauth routes
Route::get('oauth/authorize', ['as' => 'oauth.authorize.get','middleware' => ['check-authorization-params', 'auth'], function() {
    // display a form where the user can authorize the client to access it's data
    $authParams = Authorizer::getAuthCodeRequestParams();
    $formParams = array_except($authParams,'client');
    $formParams['client_id'] = $authParams['client']->getId();
    return view('oauth.authorization-form', ['params'=>$formParams,'client'=>$authParams['client']]);
}]);

Route::post('oauth/authorize', ['as' => 'oauth.authorize.post','middleware' => ['check-authorization-params', 'auth'], function() {

    $params = Authorizer::getAuthCodeRequestParams();
    $params['user_id'] = Auth::user()->id;

    $redirectUri = '';

    // if the user has allowed the client to access its data, redirect back to the client with an auth code
    if (Input::get('approve') !== null) {
        $redirectUri = Authorizer::issueAuthCode('user', $params['user_id'], $params);
    }

    // if the user has denied the client to access its data, redirect back to the client with an error message
    if (Input::get('deny') !== null) {
        $redirectUri = Authorizer::authCodeRequestDeniedRedirectUri();
    }

    return Redirect::to($redirectUri);
}]);

Route::post('oauth/access_token', function() {
    return Response::json(Authorizer::issueAccessToken());
});

Route::get('oauth/user', ['middleware' => 'oauth', function(){

    $user_id = Authorizer::getResourceOwnerId();
    $user    = \App\Cours\User\Entities\User::find($user_id);

    return Response::json(['first_name' => $user->first_name, 'last_name' => $user->last_name, 'email' => $user->email, 'id' => $user_id]);
}]);

// Login via shop
Route::get('auth/droithub', 'Auth\AuthController@redirectToProvider');
Route::get('auth/droithub/callback', 'Auth\AuthController@handleProviderCallback');

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
    $tickets = \App::make('App\Cours\Help\Repo\TicketInterface');
    $ticket = $tickets->find(1);

    $comments = \App::make('App\Cours\Help\Repo\CommentInterface');
    $comment  = $comments->find(1);

    //return View::make('emails.ticket', ['ticket' => $ticket]);
    return View::make('emails.comment', ['comment' => $comment]);
    /*
        \App\Cours\User\Entities\User::create(array(
            'name'     => 'Etudiant',
            'email'    => 'info@methodologie.ch',
            'password' => Hash::make('mj2015')
        ));
     */
});
