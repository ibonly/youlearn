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
Route::group(['middleware' => 'guest'], function () {
    Route::get('/', [
        'uses' => 'IndexController@homePage',
        'as'   => 'home'
    ]);

    Route::get('/login', [
        'uses' => 'Auth\AuthController@loginPage',
        'as'   => 'login'
    ]);

    Route::post('/login', [
        'uses' => 'Auth\AuthController@postLogin'
    ]);

    Route::get('/login/{provider}', [
        'uses' => 'OauthController@getSocialRedirect',
        'as'   => 'login',
        'middleware'   => ['guest']
    ]);

    Route::get('/register', [
        'uses' => 'Auth\AuthController@registrationPage',
        'as'   => 'register',
        'middleware'   => ['guest']
    ]);

    Route::post('/register', [
        'uses' => 'Auth\AuthController@register'
    ]);

    /*
    /-------------------------------------------------------------------------------
    / Password reset link request
    /-------------------------------------------------------------------------------
    */

    Route::get('/passwordreset', [
        'uses' => 'Auth\PasswordController@passwordPage',
        'as'   => 'passwordreset'
    ]);

    Route::post('password/email', [
        'uses' => 'Auth\PasswordController@postEmailForm',
        'as'   => 'passwordreset'
    ]);

    // Password reset routes...
    Route::get('password/reset/{token}', [
        'uses' =>'Auth\PasswordController@getResetPage',
        'as'   => 'passwordresetpage'
    ]);

    // #resetGetEmail
    Route::post('password/resetGetEmail', [
        'uses' => 'Auth\PasswordController@postResetCheckEmail',
        'as'   => 'postpasswordresetCheckEmail'
    ]);

});

Route::post('/search', [
    'uses' => 'SearchController@show',
    'as'   => 'search'
]);

Route::get('/play/{title}', [
    'uses' => 'VideoController@playVideo',
    'as'   => 'play'
]);

Route::get('/category/{name}', [
    'uses' => 'CategoryController@getVideoInCategory',
    'as'   => 'category'
]);

Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', [
        'uses' => 'IndexController@homePage',
        'as'   => 'home'
    ]);

    Route::get('/user/details', [
        'uses' => 'UserController@editPage',
        'as'   => 'edit'
    ]);

    Route::post('/user/update', [
        'uses' => 'UserController@userUpdate'
    ]);

    Route::post('/user/avatar', [
        'uses' => 'UserController@uploadAvatar'
    ]);

    Route::get('/logout', [
        'uses' => 'Auth\AuthController@getLogout',
        'as'   => 'logout'
    ]);

    Route::get('/user/videos', [
        'uses' => 'UserController@myVideos',
        'as'   => 'myVideos'
    ]);

    Route::get('/video/upload', [
        'uses' => 'VideoController@uploadPage',
        'as'   => 'upload'
    ]);

    Route::post('/video/upload', [
        'uses' => 'VideoController@uploadVideo'
    ]);

    Route::get('/video/{title}/edit', [
        'uses' => 'VideoController@updatePage',
        'as'   => 'video-edit'
    ]);

    Route::post('/video/edit', [
        'uses' => 'VideoController@editVideo',
        'as'   => 'video-edit'
    ]);

    Route::delete('/video/{id}/delete', [
        'uses' => 'VideoController@deleteVideo'
    ]);
});
