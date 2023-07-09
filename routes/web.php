<?php

use Illuminate\Support\Facades\Route;
define('PAGINATION_COUNT',10);
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
Route::get('view-all','CategoryController@index')->name('categories.all');

Route::get('create','CategoryController@create');
Route::post('store','CategoryController@store')->name('categories.store');

Route::get('edit/{category_id}','CategoryController@edit')->name('categories.edit');
Route::post('update/{category_id}','CategoryController@update')->name('categories.update');

Route::get('delete/{category_id}','CategoryController@destroy')->name('categories.delete');


