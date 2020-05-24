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
Route::fallback(function () {
    return view('error.404');
});

Route::get('/', 'HomeController@index')->name('home');
Route::get('/cardapio', 'HomeController@cardapio')->name('cardapio');
Route::get('/product/id={id}', 'ProductController@product_info');

/* ****** LOGIN ******* */
Route::get('/login', 'UserController@login')->name('login');
Route::get('/logout', 'UserController@logout')->name('logout');
Route::post('/validation_login', 'UserController@validation_login');
/* ****** REGISTER ******* */
Route::get('/cadastro', 'UserController@register')->name('register');
Route::post('/validation_register', 'UserController@validation_register');
/* ****** ADMIN AREA ******* */
Route::group(['prefix' => 'admin'], function() {
    Route::get('/products', 'ProductController@products_all')->name('product_stock');
    Route::get('/delete_product/{id}', 'ProductController@delete_product');
    Route::post('/validation_product_register', 'ProductController@validation_product_register');
    /*******/
    Route::get('/users', 'UserController@get_users')->name('users')->middleware('auth');
    Route::get('/admins', 'UserController@get_admins')->name('admins')->middleware('auth');
    Route::get('/delete_user/{id}', 'UserController@delete_user')->middleware('auth');
    Route::get('/delete_admin/{id}', 'UserController@delete_admin')->middleware('auth');
    Route::post('/edit_nivel', 'UserController@admin_edit_nivel')->name('edit_nivel_user')->middleware('auth');
    Route::post('/edit_nivel_admin', 'UserController@admin_edit_nivel_admin')->name('edit_nivel_admin')->middleware('auth');
    /*******/
    Route::get('/confirmed', 'OrderController@orders_confirmed')->name('confirmed');
    Route::get('/delivery', 'OrderController@orders_delivery')->name('delivery');
    /*******/
});

Route::get('/cart', 'OrderController@index')->name('cart');
Route::post('/cart_submit', 'OrderController@cart_submit')->name('cart_submit');
Route::post('/insert_cart', 'OrderController@insert_cart')->name('insert_cart');

/* ****** ORDERS ******* */
Route::get('/delete_order/{id}', 'OrderController@delete_order');
Route::get('/finish_order', 'OrderController@finish_order')->name('finish_order');
Route::post('/order_submit', 'OrderController@order_submit')->name('order_submit');
Route::get('/quantidade/{id}', 'OrderController@quantidade');
Route::post('/alterarQtd', 'OrderController@quantidade_post');

/* ****** ADRESS ******* */
Route::get('/custom_adress', 'OrderController@adress')->name('adress');
Route::post('/add_adress', 'OrderController@add_adress');
Route::get('/delete_adress/{id}', 'OrderController@delete_adress');
Route::post('/update_adress', 'OrderController@delivery');
Route::post('/store', 'OrderController@restaurant');

/* ****** PAYMENT ******* */
Route::get('/payment', 'OrderController@payment')->name('payment');
Route::post('/payment_post', 'OrderController@payment_post')->name('pay_post');
Route::post('/add_card', 'OrderController@add_card');

/* ****** USERS_INFOS ******* */
Route::get('/my_orders', 'UserController@get_orders')->name('orders')->middleware('auth');
Route::get('/my_account', 'UserController@account')->name('account')->middleware('auth');
Route::get('/edit_user', 'UserController@edit_user')->name('edit_user')->middleware('auth');
Route::post('/edit_user_val', 'UserController@edit_user_val')->middleware('auth');
Route::get('/edit_name', 'UserController@edit_name')->name('edit_name')->middleware('auth');
Route::post('/edit_name_val', 'UserController@edit_name_val')->middleware('auth');
Route::get('/edit_email', 'UserController@edit_email')->name('edit_email')->middleware('auth');
Route::post('/edit_email_val', 'UserController@edit_email_val')->middleware('auth');
Route::get('/edit_phone', 'UserController@edit_phone')->name('edit_phone')->middleware('auth');
Route::post('/edit_phone_val', 'UserController@edit_phone_val')->middleware('auth');
Route::get('/edit_pass', 'UserController@edit_pass')->name('edit_pass')->middleware('auth');
Route::post('/edit_pass_val', 'UserController@edit_pass_val')->middleware('auth');
