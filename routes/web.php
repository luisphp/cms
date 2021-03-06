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

Route::redirect('/','blog');

Auth::routes();


//Rutas web

Route::get('blog', 'Web\PageController@blog')->name('blog');
Route::get('entrada/{slug}',   'Web\PageController@post')->name('post');
Route::get('categoria/{slug}', 'Web\PageController@category')->name('category');
Route::get('etiqueta/{slug}',  'Web\PageController@tag')->name('tag');


//Rutas admin
Route::resource('tags',       'Admin\TagController');
Route::resource('posts', 	  'Admin\PostController');
Route::resource('categories', 'Admin\CategoryController');

