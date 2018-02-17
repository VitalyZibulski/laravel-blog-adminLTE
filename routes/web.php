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

Route::group(['prefix'=>'admin','namespace'=>'Admin'], function(){
    Route::get('/', 'DashboardController@index');
    Route::resource('/categories','CategoriesController');
    Route::resource('/tags','TagsController');
    Route::resource('/users','UsersController');
    Route::resource('/posts','PostsController');
});

//index - создаем листинг
//create - форма создания ресурса
//store - сохранение новой записи
//edit - изменение записи
//update - edit перенаправит в update
//destroy
