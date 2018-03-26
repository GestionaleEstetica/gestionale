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
    return view('home');
});
Route::get('/products/search','ProductsController@search');
Route::resource('/products', 'ProductsController');

Route::get('/treatments/search','TreatmentsController@search');
Route::resource('/treatments', 'TreatmentsController');

Route::get('/clients/recent','ClientsController@recent');
Route::resource('/clients', 'ClientsController');

Route::get('/test','TestController@index');
