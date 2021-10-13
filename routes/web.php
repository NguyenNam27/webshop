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


Route::get('/','ShopController@index')->name('shop.index');

Route::get('/lien-he', 'ShopController@contact')->name('shop.contact');
Route::post('/lien-he', 'ShopController@postContact')->name('shop.postContact');

Route::get('/index','ShopController@index')->name('shop.index');

Route::get('/Category/{type}','ShopController@Category')->name('shop.category');
Route::get('/chitietsanpham/{id}','ShopController@Chitietsanpham')->name('shop.chitietsanpham');
Route::get('/article','ShopController@Articles')->name('shop.article');
Route::get('/tim-kiem','ShopController@Seach')->name('shop.timkiem');
Route::get('/dang-ky','ShopController@Register')->name('shop.register');
Route::post('dang-ky','ShopController@postRegister')->name('shop.postRegister');
Route::get('/dang-nhap','ShopController@Login')->name('shop.Login');
Route::post('dang-nhap','ShopController@postLogin')->name('shop.postLogin');

Route::get('/admin/logout', 'ShopController@logout')->name('admin.logout');

// //trang danh sách giỏ hàng
Route::get('/danhsachgiohang','CartController@index')->name('cart.index');

//thêm sản phẩm vào giỏ hàng
Route::get('/giohang/{id}','CartController@addtoCart')->name('cart.addcart');

Route::get('Delete-cart/{id}','CartController@DeleteCart')->name('delete.cart');

Route::get('cap-nhap-so-luong-sp','CartController@updateCart')->name('update.cart');
Route::get('huy-don-hang','CartController@destroy')->name('destroy.cart');

Route::get('order-product','ShopController@OrderProduct')->name('order.product');







Route::get('/admin', 'AdminController@login')->name('admin.index');
Route::get('/admin/login', 'AdminController@login')->name('admin.login');
Route::post('/admin/login', 'AdminController@postLogin')->name('admin.postLogin');






Route::group(['prefix' => 'admin','as'=>'admin.'], function(){
    Route::post('/store','LoginController@store');
    Route::resource('photo', 'PhotoController');
    Route::resource('vendor', 'VendorController');
    Route::resource('category', 'CategoryController');
    Route::resource('user','UserController');
    Route::resource('banner','BannerController');
    Route::resource('product','ProductController');
    Route::resource('article','ArticlesController');
    Route::resource('setting', 'settingController');
    Route::resource('contact', 'ContactController');
});




