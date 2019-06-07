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

Route::get('/categories', 'CategoriesController@index')
    ->name('categories_list');
Route::get('/categories/create', 'CategoriesController@create')
    ->name('categories_form');
Route::post('/categories/create', 'CategoriesController@store');
Route::post('/categories/{id}/edit', 'CategoriesController@edit');
Route::delete('/categories/{id}', 'CategoriesController@destroy');

Route::get('/products', 'ProductsController@index')
    ->name('products_list');
Route::get('/products/create', 'ProductsController@create')
    ->name('products_form');
Route::post('/products/create', 'ProductsController@store');
Route::get('/products/{id}/editForm', 'ProductsController@edit');
Route::post('/products/{id}/editForm', 'ProductsController@update');
Route::delete('/products/{id}', 'ProductsController@destroy');