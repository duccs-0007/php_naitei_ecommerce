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

Route::get('/', 'StaticPagesController@home');
Route::get('/contact', 'StaticPagesController@contact');

Auth::routes(['verify' => true]);

Route::get('users/{user}',  ['as' => 'users.edit', 'uses' => 'UserController@edit']);
Route::patch('users/{user}/update',  ['as' => 'users.update', 'uses' => 'UserController@update']);

Route::get('/home', 'HomeController@index')->name('home');

/**
 * Route for Product
 */
Route::resource('products', 'ProductsController', ['parameters' => [
    'show' => 'slug',
    'edit' => 'slug',
]]);
