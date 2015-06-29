<?php

Route::model('posts', Post::class);

Route::get('/', ['as' => 'home', 'uses' => HomeController::class . '@index']);

Route::resource('posts', PostsController::class);

Route::model('comments', Comment::class);

Route::resource('posts.comments', CommentsController::class);

Route::get('login', ['as' => 'login', 'uses' => 'UsersController@login', 'before' => 'guest']);

Route::post('login', ['as' => 'login', 'uses' => 'UsersController@authenticate']);

Route::get('logout', ['as' => 'logout', function () { }])->before('auth');

Route::get('profile', ['as' => 'profile', function () { }])->before('auth');

Route::get('login', [
    'as' => 'login', function () {
    return View::make('login');
}
])->before('guest');

Route::post('login', ['as' =>'authenticate', 'uses' =>'UsersController@authenticate']);

Route::post('profile', ['as' => 'profile', 'uses' => 'UsersController@profile']);

Route::get('logout', ['as' => 'logout', 'uses' => 'UsersController@logout']);

Route::get('login', ['as' => 'login', 'uses' => 'UsersController@login']);

Route::model('users', User::class);

Route::resource('users', UsersController::class);

