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



Route::get('/', 'FrontController@index');
Route::get('produit/{id}', 'FrontController@show')->where(['id' => '[0-9]+']);

Route::get('category/{title}', 'FrontController@showProductByCategory')->where(['title' => '[a-zA-Z]+']); 
//Route::get('category/Homme', 'FrontController@showProductByCategory')->where(['id' => '[1-2]']); 

Route::get('solde', 'FrontController@showProductByCode');
Auth::routes();
Route::resource('admin/product', 'ProductController')->middleware('auth');
Route::get('/home', 'HomeController@index')->name('home'); 
