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

Route::redirect('/', 'products');

Route::match(['get'], '/products', 'ProductsController@products')->name('products');
Route::match(['get'], '/product-list', 'ProductsController@productsList')->name('productsList');
Route::match(['post'],'/productsList/addProduct', 'ProductsController@addProduct')->name('addProduct'); // get post
Route::match(['get', 'post'],'/productsList/productSelection/{id}', 'ProductsController@productSelection')->name('productSelection');
Route::match(['get'],'/productsList/deleteProduct/{id}', 'ProductsController@deleteProduct')->name('deleteProduct');
Route::match(['post'],'/productsList/updateProduct/{id}', 'ProductsController@updateProduct')->name('updateProduct');
