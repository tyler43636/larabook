<?php

/** Pages */
use Larabook\Statuses\Status;

Route::get('/', [
    'as' => 'home',
    'uses' => 'PagesController@home'
]);

/** Registration */
Route::get('register', [
    'as' => 'register',
    'uses' => 'RegistrationController@create'
]);

Route::post('register', [
    'as' => 'register',
    'uses' => 'RegistrationController@store'
]);

/** Sessions */
Route::get('login', [
    'as' => 'login',
    'uses' => 'SessionsController@create'
]);
Route::post('login', [
    'as' => 'login',
    'uses' => 'SessionsController@store'
]);
Route::get('logout',[
    'as' => 'logout',
    'uses' => 'SessionsController@destroy'
]);

/** Statuses */
Route::get('statuses', [
    'as' => 'statuses',
    'uses' => 'StatusesController@index'
]);
Route::post('statuses', [
    'as' => 'statuses',
    'uses' => 'StatusesController@store'
]);

/** Users */
Route::get('users', [
    'as' => 'users',
    'uses' => 'UsersController@index'
]);
Route::get('@{username}', [
    'as' => 'profile',
    'uses' => 'UsersController@show'
]);

/** Follows */
Route::post('follows', [
    'as' => 'follows',
    'uses' => 'FollowsController@store'
]);
Route::delete('follows/', [
    'as' => 'follows',
    'uses' => 'FollowsController@destroy'
]);

Route::get('test', ['as' => 'test', function () {

    $allUsers = Cache::remember('everything', 1440, function () {
        return Status::all();
    });

    return Response::json($allUsers->toArray());
}]);

