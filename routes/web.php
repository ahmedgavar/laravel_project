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


//Client Controller
Route::get('/','ClientController@home');
Route::get('/cart','ClientController@cart');
Route::get('/shop','ClientController@shop');
Route::get('/checkout','ClientController@checkout');
Route::get('/signup','ClientController@signup');
Route::get('/login','ClientController@login');

//AdminController

Route::get('/admin','AdminController@dashboard');
Route::get('/orders','AdminController@showorders');


//Categories
Route::get('/addcategory','CategoryController@addcategory');
Route::post('/savecategory','CategoryController@savecategory');
Route::get('/edit_category/{id}','CategoryController@editcategory');
Route::post('/updatecategory','CategoryController@updatecategory');
Route::get('/categories','CategoryController@categories');
Route::get('/delete_category/{id}','CategoryController@delete');



//Products
Route::get('/addproduct','ProductController@addproduct');
Route::post('/saveproduct','ProductController@saveproduct');
Route::get('/products','ProductController@products');
Route::post('/updateproduct','ProductController@updateproduct');
Route::get('/products','ProductController@products');
Route::get('/edit_product/{id}','ProductController@editproduct');
Route::get('/delete_product/{id}','ProductController@deleteproduct');
Route::get('/activate_product/{id}','ProductController@activate_product');
Route::get('/disactivate_product/{id}','ProductController@disactivate_product');




//Sliders
Route::get('/sliders','SliderController@sliders');
Route::get('/addslider','SliderController@addslider');
Route::post('/saveslider','SliderController@saveslider');
Route::get('/edit_slider/{id}','SliderController@editslider');
Route::post('/updateslider','SliderController@updateslider');
Route::get('/delete_slider/{id}','SliderController@deleteslider');
Route::get('/activate_slider/{id}','SliderController@activate_slider');
Route::get('/disactivate_slider/{id}','SliderController@disactivate_slider');















