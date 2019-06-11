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

Route::get('/', 'StaticPagesController@home')->name('root');
Route::get('/contact', 'StaticPagesController@contact');

Auth::routes(['verify' => true]);

Route::get('users/{user}',  ['as' => 'users.edit', 'uses' => 'UserController@edit']);
Route::patch('users/{user}/update',  ['as' => 'users.update', 'uses' => 'UserController@update']);

Route::group([
    'prefix' => 'admin',
    'namespace' => 'Admin',
    'middleware' => 'auth',
    ], function(){
        Route::get('users', 'UsersController@index')
            ->middleware('can:users.resource', 'can:users.index');
        Route::get('users/create', 'UsersController@')
            ->middleware('can:users.resouces');
        Route::get('users/edit', 'UsersController@edit')
            ->middleware('can:users.resouces', 'can:users.edit');
        }
    );

Route::get('/home', 'HomeController@index')->name('home');

/**
 * Route for Product
 */
Route::resource('products', 'ProductsController', ['parameters' => [
    'show' => 'slug',
    'edit' => 'slug',
]]);

/**
 * Route for Cart
 */
Route::post('/add-to-cart', 'CartsController@addToCart')->name('addToCart');
Route::get('/carts', 'CartsController@index')->name('cartIndex');
