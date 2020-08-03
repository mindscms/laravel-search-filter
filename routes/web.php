<?php

use Illuminate\Support\Facades\Route;

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


Route::any('/ecommerce', 'EcommerceController@index')->name('ecommerce.index');
Route::any('/ecommerce/list', 'EcommerceController@index_list')->name('ecommerce.index_list');
Route::get('/ecommerce/create', 'EcommerceController@create')->name('ecommerce.create');
Route::post('/ecommerce/create', 'EcommerceController@store')->name('ecommerce.store');
Route::get('/ecommerce/{id}/edit', 'EcommerceController@edit')->name('ecommerce.edit');
Route::patch('/ecommerce/{id}/edit', 'EcommerceController@update')->name('ecommerce.update');
Route::delete('/ecommerce/{id}', 'EcommerceController@destroy')->name('ecommerce.destroy');







Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
