<?php
// Home 
Route::get('/', function () 
{
    return view('welcome');
});

// Login
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

// News
Route::get('/news', 'NewsController@index')->name('news'); 
Route::get('/news/{news}', 'NewsController@show'); 

// Inquiry
Route::get('/contact', 'InquiryController@create')->name('contact');
Route::post('/inquiry/new', 'InquiryController@store'); 

// Products
Route::get('/store', 'ProductController@index')->name('store');;
Route::get('/product/{product}', 'ProductController@show');

// Search
Route::get('/search/', 'ProductController@search');

// Tags
Route::get('/product/tag/{tag}','TagController@index');

// About
Route::get('/about', 'NewsController@about')->name('about'); 

// Comments
Route::post('/product/{product}/comment', 'CommentController@store'); 

// Cart
Route::get('/cart', 'ProductController@cart'); 
Route::get('/cart/checkout', 'ProductController@checkout'); 
Route::get('/cart/checkout/complete', 'ProductController@newOrder'); 
Route::post('/cart/checkout/complete', 'ProductController@newOrder'); 
Route::post('/product/{product}/add', 'ProductController@addToCart'); 
Route::get('/cart/remove/{id}', 'ProductController@removeFromCart'); 
Route::get('/cart/plus/{id}', 'ProductController@plus'); 
Route::get('/cart/minus/{id}', 'ProductController@minus'); 

// Protects these routes with middleware
Route::group(['middleware' => 'is.admin'], function () {
    
    // Tag/Category
    Route::get('/cms/tag/new','TagController@show');
    Route::get('/cms/tag/edit/{tag}','TagController@editView');
    Route::post('/cms/tag/edit/{tag}','TagController@edit');
    Route::post('/cms/tag/new','TagController@store');
    Route::post('/cms/tag/delete/{tag}','TagController@delete');
    
    // Manufacturer
    Route::get('/cms/manufacturer/new','ManufacturerController@show');
    Route::get('/cms/manufacturer/edit/{manufacturer}','ManufacturerController@editView');
    Route::post('/cms/manufacturer/edit/{manufacturer}','ManufacturerController@edit');
    Route::post('/cms/manufacturer/new','ManufacturerController@store');
    Route::post('/cms/manufacturer/delete/{manufacturer}','ManufacturerController@delete');

    // News
    Route::post('/cms/news/edit/{news}', 'NewsController@edit'); 
    Route::get('/cms/news/edit/{news}', 'NewsController@editView');
    Route::get('/cms/news/new', 'NewsController@create'); 
    Route::post('/cms/news/new', 'NewsController@store'); 
    Route::post('/cms/news/delete/{news}', 'NewsController@delete'); 
    
    // Work hours 
    Route::post('/cms/hours/edit/{hours}', 'CmsController@hours'); 

    // Product
    Route::get('/cms', 'CmsController@index')->name('cms');
    Route::post('/cms/product/archive/{product}', 'CmsController@archive');
    Route::post('/cms/product/unarchive/{product}', 'CmsController@unArchive');
    Route::get('/cms/product/edit/{product}', 'ProductController@editView');
    Route::post('/cms/product/edit/{product}', 'ProductController@edit');
    Route::post('/cms/product/delete/{product}', 'ProductController@delete');
    Route::get('/cms/product/new', 'ProductController@create'); 
    Route::post('/cms/product/new', 'ProductController@store'); 

    // Order
    Route::post('/cms/order/complete/{order}', 'CmsController@completeOrder');

    // Inquiry
    Route::post('/cms/inquiry/complete/{inquiry}', 'InquiryController@complete');  

    // Users
    Route::post('/cms/type/{user}', 'CmsController@type');

});

