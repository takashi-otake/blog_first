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

// Route::get('/',function(){
//     return view('welcome');
// });



Route::group(['middleware'=>'auth'],function(){

    Route::get('/', 'HomeController@index')->name('home');

    Route::get('posts/serch','PostsController@serch')->name('posts.serch');
    
    Route::group(['prefix'=>'posts'],function(){
        Route::get('index','PostsController@index')->name('posts.index'); 
        Route::get('create','PostsController@create')->name('posts.create');
        Route::post('store','PostsController@store')->name('posts.store');
        Route::get('show/{id}','PostsController@show')->name('posts.show');
        Route::get('edit/{id}','PostsController@edit')->name('posts.edit');
        Route::post('update/{id}','PostsController@update')->name('posts.update');
        Route::post('destroy/{id}','PostsController@destroy')->name('posts.destroy');
    });
    
});

Auth::routes();

