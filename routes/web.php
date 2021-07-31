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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/','ClientController@home');
Route::get('/cart','ClientController@cart');
Route::get('/shop','ClientController@shop');
Route::get('/checkout','ClientController@checkout');
Route::get('/signup','ClientController@signup');
Route::get('/login','ClientController@login');



Route::get('/admin','AdminController@dashboard');
Route::get('/addcategory','AdminController@addcategory');
Route::get('/addproduct','AdminController@addproduct');








