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
    return view('auth/login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/thankyou', 'FrontendController@thankyou')->name('thankyou');
Route::get('/shop/{id}','FrontendController@show')->name('product.view');
Route::get('/category/{name}','FrontendController@filter')->name('product.filter');


Route::get('/orders','CartController@order')->name('order')->middleware('auth');
Route::get('/ordersuser/{userid}/{orderid}','CartController@orderuser')->name('user.view')->middleware('auth');
Route::get('/checkout/{amount}','CartController@checkout')->name('cart.checkout');
Route::post('/charge','CartController@charge')->name('cart.charge')->middleware('auth');
Route::get('/addToCart/{product}','CartController@addToCart')->name('add.cart');
Route::post('/products/{product}','CartController@updateCart')->name('cart.update');
Route::post('/product/{product}','CartController@removeCart')->name('cart.remove');
Route::get('/cart','CartController@showCart')->name('cart.show');
Route::get('/tracking/{userid}/{orderid}','CartController@tracking')->name('user.tracking')->middleware('auth'); 



Route::resource('company','CompanyController');
Route::get('/shop', 'FrontendController@index')->name('shop')->middleware('auth');



Route::group(['prefix'=>'auth','middleware'=>['auth','isAdmin']],function(){
	Route::get('/dashboard', function () {
    return view('admin.dashboard');
});



	Route::resource('category','CategoryController');
	Route::resource('product','ProductController');
	Route::get('users','UserController@index')->name('user.index');
	//orders
	
	Route::get('/orders','CartController@userOrder')->name('order.index')->middleware('auth');
	Route::get('/orders/{userid}/{orderid}/edit','CartController@editStatus')->name('status.edit');
	Route::put('/orders/{userid}/{orderid}/edit','CartController@updateStatus')->name('status.update');
	Route::get('/orders/{userid}/{orderid}','CartController@viewUserOrder')->name('user.order');
	Route::get('/orders/search', 'CartController@search')->name('order.search');

	


});