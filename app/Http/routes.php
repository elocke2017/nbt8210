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

Route::get('php-version', function()
{
    return phpinfo();
});

Route::get('laravel-version', function()
{
    $laravel = app();
    return 'Your Laravel Version is '.$laravel::VERSION;
});

Route::get('/', [
	'uses' =>'CourseController@getIndex',
	'as' => 'course.index'
]);

Route::get('/search', [
    'uses' => 'CourseController@search',
    'as' => 'course.search'
]);

Route::get('/add-to-cart/{id}', [
    'uses' => 'CourseController@getAddToCart',
    'as' => 'course.addToCart'
]);

Route::get('/reduce/{id}', [
    'uses' => 'CourseController@getReduceByOne',
    'as' => 'course.reduceByOne'
]);

Route::get('/remove/{id}', [
    'uses' => 'CourseController@getRemoveItem',
    'as' => 'course.remove'
]);

Route::get('/shopping-cart', [
    'uses' => 'CourseController@getCart',
    'as' => 'course.shoppingCart'
]);

Route::get('/checkout', [
    'uses' => 'CourseController@getCheckout',
    'as' => 'checkout',
    'middleware' => 'auth'
]);

Route::post('/checkout', [
    'uses' => 'CourseController@postCheckout',
    'as' => 'checkout',
    'middleware' => 'auth'
]);

//Route::group(['middleware' => 'web'], function () {
Route::auth();
Route::post('change-password', 'Auth\AuthController@updatePassword');
Route::get( 'change-password', 'Auth\AuthController@updatePassword');

Route::get('/home', 'HomeController@index');

Route::resource('users', 'UsersController');
Route::resource('roles', 'RolesController');

//Route::group(['prefix' => 'user'], function() {
    Route::group(['middleware' => 'web'], function() {
        Route::get('/user/signup', [
            'uses' => 'UserController@getSignup',
            'as' => 'user.signup',
            //    'middleware' => 'guest',
        ]);

        Route::post('/user/signup', [
            'uses' => 'UserController@postSignup',
            'as' => 'user.signup',
            //    'middleware' => 'guest',
        ]);

        Route::get('/user/signin', [
            'uses' => 'UserController@getSignin',
            'as' => 'user.signin',
            //    'middleware' => 'guest',
        ]);

        Route::post('/user/signin', [
            'uses' => 'UserController@postSignin',
            'as' => 'user.signin',
            //    'middleware' => 'guest',
        ]);

    });

    Route::group(['middleware' => 'auth'], function() {
        Route::get('/user/profile', [
            'uses' => 'UserController@getProfile',
            'as' => 'user.profile',
            //    'middleware' => 'auth',
        ]);

        Route::get('/user/logout', [
            'uses' => 'UserController@getLogout',
            'as' => 'user.logout',
            //    'middleware' => 'auth',
        ]);
    });

    Route::resource('courses','CourseController');
	Route::get('/contactus', 'Controller@contactus');
//});
