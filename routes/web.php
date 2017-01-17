<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

//Main page
Route::get('/','MainController@main');
Route::get('/main','MainController@main');
Route::get('/search', 'MainController@search');

//Category && product
Route::get('/category/{id}','CategoryController@index');
Route::get('/product/{id}','ProductController@index');

//Auth
Auth::routes();


//Comments
Route::post('/product/{id}', 'CommentController@add_comment');
Route::get('/likes/{id}/{plusMinus}', 'CommentController@likes');

//Personal cabinet
Route::get('/user/{id}','UserController@index');
Route::post('/user/{id}', 'UserController@change');

//Cart
Route::get('/cart/{id}','ProductController@add_to_cart');
Route::get('/cart','ProductController@cart');
Route::get('/clear','ProductController@clear_cart');
Route::get('/clear/{id}','ProductController@delete_from_cart');


//ADMIN
//Route::get('/admin', 'AdminController@index');
Route::group(['prefix'=>'admin'], function()
{
    Route::get('/', 'AdminController@index');
    Route::get('/settings', 'AdminController@settings');
    Route::post('/settings/save_background_color', 'AdminController@save_background_color');
    Route::get('/comments', 'AdminController@comments');
    Route::post('/comments/save/{id}', 'AdminController@save_comment');

});
