<?php

//Frontend routes.........................
Route::get('/', 'HomeController@index');
Route::get('/product-by-category/{id}', 'HomeController@ProductByCategory');
Route::get('/product-by-manufacture/{id}', 'HomeController@ProductByManufacture');
Route::get('/view-product/{id}', 'HomeController@ViewProductDetail');

//routes for cat
Route::post('/add-to-cart', 'CartController@AddToCart');
Route::get('/show-cart', 'CartController@ShowCart');
Route::get('/delete-to-cart/{id}', 'CartController@DeleteToCart');
Route::post('/update-to-cart', 'CartController@UpdateToCart');

//Route for checkout
Route::get('/login-check', 'CheckoutController@login_check');
Route::post('/customer-registration', 'CheckoutController@customer_registration');
Route::get('/checkout', 'CheckoutController@checkout');
Route::post('/save-shipping-details', 'CheckoutController@save_shipping');
//customer login and logout
Route::post('/customer-login', 'CheckoutController@customer_login');
Route::get('/customer-logout', 'CheckoutController@customer_logout');

Route::get('/payment', 'CheckoutController@payment');
Route::post('/order-place', 'CheckoutController@order_place');

//order manage routes
Route::get('/manage-order', 'CheckoutController@manage_order');
Route::get('/view-order/{id}', 'CheckoutController@view_order');



//Backend routes........................
Route::get('admin', 'AdminController@index');
Route::get('/logout', 'SuperAdminController@logout');
Route::get('/dashboard', 'SuperAdminController@index');
Route::post('/admin-dashboard', 'AdminController@dashboard');

//category related route
Route::get('/add-category', 'CategoryController@index');
Route::post('/save-category', 'CategoryController@store');
Route::get('/edit-category/{id}', 'CategoryController@edit');
Route::post('/update-category/{id}', 'CategoryController@update');
Route::get('/delete-category/{id}', 'CategoryController@delete');
Route::get('/all-category', 'CategoryController@AllCategory');
Route::get('/unactive-category/{id}', 'CategoryController@UnActive');
Route::get('/active-category/{id}', 'CategoryController@Active');

//manufacture related route
Route::get('/add-manufacture', 'ManufactureController@index');
Route::post('/save-manufacture', 'ManufactureController@store');
Route::get('/all-manufacture', 'ManufactureController@AllManufacture');
Route::get('/unactive-manufacture/{id}', 'ManufactureController@UnActive');
Route::get('/active-manufacture/{id}', 'ManufactureController@Active');
Route::get('/edit-manufacture/{id}', 'ManufactureController@edit');
Route::post('/update-manufacture/{id}', 'ManufactureController@update');
Route::get('/delete-manufacture/{id}', 'ManufactureController@delete');

//products related route
Route::get('/add-product', 'ProductController@index');
Route::post('/save-product', 'ProductController@store');
Route::get('/all-product', 'ProductController@AllProduct');
Route::get('/unactive-product/{id}', 'ProductController@UnActive');
Route::get('/active-product/{id}', 'ProductController@Active');
Route::get('/edit-product/{id}', 'ProductController@edit');
// Route::post('/update-product/{id}', 'ProductController@update');
// Route::get('/delete-product/{id}', 'ProductController@delete');

//slider related route
Route::get('/add-slider', 'SliderController@index');
Route::post('/save-slider', 'SliderController@store');
Route::get('/all-slider', 'SliderController@AllSlider');
Route::get('/unactive-slider/{id}', 'SliderController@UnActive');
Route::get('/active-slider/{id}', 'SliderController@Active');
Route::get('/delete-slider/{id}', 'SliderController@delete');

