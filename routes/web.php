<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//Auth::routes();
// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
//Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
//Route::post('register', 'Auth\RegisterController@register');

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.request');


Route::get('home', 'HomeController@index')->name('home')->middleware('auth');

//GET POST
Route::get('post/{id}', 'HomeController@post')->middleware('auth');

//SEND COMMENT
Route::post('post/{id}', 'CommentController@store')->middleware('auth');

//DELETE COMMENT
Route::post('post/comment/{id}', 'CommentController@deleteCommentFromPost')->middleware('auth');

//SEARCH
Route::post('home', 'HomeController@update')->middleware('auth');

//GET DRAFT PREVIEW PAGE
Route::get('preview/{id}', 'PostController@previewPage')->middleware('is.admin')->middleware('auth');


Route::group(['middleware' => 'is.admin'], function () {

    Route::get('dashboard', 'DashBoardController@index')->middleware('auth');

    Route::group(['prefix' => 'dashboard'], function () {

        //GET DASHBOARD WELCOME PAGE
        //Route::get('default', 'DashBoardController@index')->middleware('auth');

        //GET POSTS PAGE
        Route::get('posts', 'DashBoardController@getPosts')->middleware('auth');

        //GET CREATE NEW POST
        Route::get('create', 'DashBoardController@create')->middleware('auth');

        //CREATE NEW POST
        Route::post('create', 'PostController@createPost')->middleware('auth');

        //GET PAGE
        Route::get('post/{id}', 'PostController@getPost')->middleware('auth');

        //UPDATE PAGE
        Route::post('post/{id}/update', 'PostController@editPost')->middleware('auth');

        //DELETE POST
        Route::post('post/{id}/delete', 'PostController@deletePost')->middleware('auth');

        //MAKE DRAFT AGAIN
        Route::post('post/{id}/backtodraft', 'PostController@backToDraftPost')->middleware('auth');

        //GET DRAFT
        Route::get('drafts', 'PostController@allDrafts')->middleware('auth');

        //UPDATE DRAFT
        Route::post('draft/{id}/update', 'PostController@editPost')->middleware('auth');

        //DELETE DRAFT
        Route::post('draft/{id}/delete', 'PostController@deletePost')->middleware('auth');

        //DELETE CHECKBOX DRAFT
        Route::post('/posts/checkboxes', 'PostController@deleteMultiplePosts')->middleware('auth');

        //GET COMMENTS
        Route::get('comments', 'DashBoardController@getComments')->middleware('auth');

        //DELETE COMMENT
        Route::post('comment/{id}', 'CommentController@deleteCommentFromCMS')->middleware('auth');

        //GET USERS
        Route::get('users', 'DashBoardController@getUsers')->middleware('auth');

    });
});

