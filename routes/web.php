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

Auth::routes();

Route::middleware('auth')->group(function () {
    
    //Route::resource('products', 'ProductsController',['except' => ['index', 'delete'] ]);
    Route::resource('products', 'ProductsController',['except' => ['index', 'destroy'] ]);
    Route::get('products','ProductsController@index')->name('products.index')->middleware('payment');        
    Route::delete('products','ProductsController@destroy')->name('products.delete')->middleware('admin');        
    

    Route::prefix('auth')->group(function () {
        Route::get('pending','Auth\AuthController@pending')->name('auth.pending');
        Route::get('unauthorized','Auth\AuthController@unauthorized')->name('auth.unauthorized');

        /// Acesso aos produtos pela tela de admin
        Route::get('access/{id}', 'Auth\AuthController@access')->name('auth.access')->middleware('payment');        
    });    
});

Route::middleware(['product'])->group(function () {
    Route::prefix('connect')->group(function(){
        Route::get('authorization', 'Auth\AuthController@authorization')->name('auth.connect.authorization');
    });
});


Route::get('/home', 'HomeController@index')->name('home');


Route::resource('subscriptions', 'SubscriptionController');