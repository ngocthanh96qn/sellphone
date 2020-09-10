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
//chuc nang search
Route::post('/autocomplete/fetch', 'User\SearchController@search')->name('autocomplete.fetch');
//chuc nang search

// trang chu 
Route::get('/', "User\CategoryController@index")->name("user.home"); 
// Cac trang user
Route::group(['prefix'=>'user','as'=>'user.'],function () {
	// Trang cac san pham trong category 
	Route::get('/category/product/{id}/{level}/{arrange}', "User\CategoryController@show")->name("productCategory");
	// Trang chi tiet san pham
	Route::get('/product/{id}', "User\ProductController@show")->name("product");
	//review
	Route::post('/review/store', "User\ReviewController@userStore")->name("addReview");
	//Search 
	Route::post('/search', "User\SearchController@getProductId")->name("search");
	//add san pham vao cart
	Route::get('/cart/add/{id}',"User\ProductController@getAddToCart")->name("addToCart");
	//trang giỏ hàng
	Route::get('/cart/show', "User\ProductController@getCart")->name("cart");
	//update qty gio hang
	Route::get('/cart/update/{id}/{action}', "User\ProductController@updateCart")->name("cartUpdate");
	//delete sp gio hang
	Route::get('/cart/delete/{id}', "User\ProductController@deleteProduct")->name("deleteProduct");
	//Check dang nhap de vao thanh toan
	Route::get('/cart/checkout', "User\OrderController@userCheckout")->name("Checkout");
	//luu don hang vao database
	Route::post('/cart/store', "User\OrderController@store")->name("cartStore");
	//huy don hang
	Route::get('/order/update/{id}/{status}', "User\OrderController@update")->name("orderUpdate");
	//kiem tra dang nhâp user
	// Route::get('/checklogin', "User\UserController@checkLogin")->name("checkLogin");
	Route::get('/login/view/{role}',  function ($role) {  return view('user.login',compact('role'));})->name("ViewLogin");
	Route::post('/login/{role}', "Auth\LoginController@login")->name("login");
	Route::get('/logout', "Auth\LoginController@logout")->name("logout");
	Route::get('/account', "User\UserController@show")->name("Account");
	Route::get('/register/view/{role}',  function ($role) {  return view('user.singUp',compact('role'));})->name("ViewSingUp");
	Route::post('/register/{role}', "User\UserController@register")->name("register");
	Route::get('/edit', "User\UserController@edit")->name("editProfile");
	Route::post('/update', "User\UserController@update")->name("updateProfile");
	////
	Route::get('/form/resetPassword', function () {return view('user.sendEmailResetPassword');})->name("formReset");
	Route::post('/sendmail',"User\UserController@ResetPassword")->name("sendMail");
	Route::get('/password/reset/{token}',function($token){
		return view('user.ResetPassword',compact('token'));})->name('ResetPassword')->middleware('signed');
	Route::post('/password/update',"User\UserController@updatePassword")->name("updatePassword");
	// Trang thanh toan
	Route::get('/checkout', function () {return view('user.checkout');})->name("checkout");
});

Route::get('/feedback/{orderId}',"User\OrderController@addFeedback")->name("feedback");
///////
Route::get('guest/cart/checkout', "User\GuestController@guestCheckout")->name("guest.Checkout");
Route::post('guest/cart/store', "User\GuestController@store")->name("guest.Store");
Route::post('guest/review/store', "User\ReviewController@guestStore")->name("guest.addReview");
/////////////route admin
Route::group(['namespace'=>'Auth'],function(){
	Route::get('/login/admin', 'LoginAdminController@getLoginAdmin')->name('auth.loginadmin');
	Route::post('/login/admin', 'LoginAdminController@postLoginAdmin')->name('auth.loginadmin');
	Route::post('/logout/admin', 'LoginAdminController@logout')->name('auth.logoutadmin');
});
Route::group(['namespace'=>'Admin','prefix'=>'admin','middleware'=>'auth'],function(){
	Route::get('index', 'IndexController@index')->name('homeadmin');
	Route::group([
		'middleware' => 'check_role:Quản lí hãng sản phẩm'
	],function () {					// ----------Category-----------// 
		Route::resource('category', 'CategoryController');
		Route::get('searchCategory', 'CategoryController@search')->name('search_category');
	});
	Route::group([
		'middleware' => 'check_role:Quản lí sản phẩm'
	],function () {					// ----------Product-----------// 
		Route::resource('product', 'ProductController');
		Route::get('searchProduct', 'ProductController@search')->name('search_product');
	});
	Route::group([
		'middleware' => 'check_role:Quản lí đơn hàng'
	],function () {					// ----------Order-----------// 
		Route::resource('order', 'OrderController');
		Route::get('searchOrder', 'OrderController@search')->name('search_order');
					// ----------Send order to mail-----------// 
		Route::get('mail/{id}', 'OrderController@sendMail')->name('sendmail');
	});
	Route::group([
		'middleware' => 'check_role:Quản lí khách hàng'
	],function () {
					//---- module Users ----//
		Route::resource('user', 'UserController');
		Route::get('searchUser', 'UserController@search')->name('search_user');
	});
	Route::group([
		'middleware' => 'check_role:Quản lí phân quyền'
	],function () {					//---- module Role  ----//
		Route::resource('role', 'RoleController');
	});
	Route::group([
		'middleware' => 'check_role:Quản lí người phân quyền'
	],function () {					//---- module User Authorization  ----//
		Route::resource('userAuth', 'UserAuthorizationController');
	});
});
////////////end admin
