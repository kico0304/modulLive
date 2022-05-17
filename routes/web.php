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

//Auth::routes();
Auth::routes([
    'register' => false, // Registration Routes
    'reset' => false, // Password Reset Routes
    'verify' => false, // Email Verification Routes
]);
Route::get('/logout', 'Auth\LoginController@logout');


Route::get('/',                 'HomeController@index')->name('home');
Route::get('/about-us',         'HomeController@about')->name('about-us');
Route::get('/contact',          'HomeController@contact')->name('contact');
Route::get('/investors',        'HomeController@investors')->name('investors');
Route::get('/technology',       'HomeController@technology')->name('technology');
Route::get('/actualities',      'HomeController@actualities')->name('actualities');
Route::get('/actualities/{id}', 'HomeController@actualitie');
Route::get('/singlearticle',    'HomeController@singlearticle')->name('singlearticle');
Route::get('/products',         'HomeController@products')->name('products');
Route::get('/product/{id}',     'HomeController@product')->name('product');
Route::get('/modules',          'HomeController@modules')->name('modules');
Route::get('/options',          'HomeController@options')->name('options');

Route::post('/product_view',    'HomeController@product_view');
Route::post('/user_email',      'HomeController@user_email');


//ADMIN ROUTES
Route::middleware(['auth', 'auth.admin'])->prefix('admin')->group(function () {

    //routes views
    Route::get('/',                         'AdminController@admin');
    Route::get('/parts',                    'AdminController@parts');
    Route::get('/options',                  'AdminController@options');
    Route::get('/language',                 'AdminController@language');
    Route::get('/actualities',              'AdminController@actualities');
    Route::get('/emails',                   'AdminController@emails');

    //product routes
    Route::post('/add_product',             'AdminController@add_product');
    Route::post('/edit_product',            'AdminController@edit_product');
    Route::post('/delete_product',          'AdminController@delete_product');
    Route::post('/delete_product_photo',    'AdminController@delete_product_photo');
    Route::post('/delete_part_product',     'AdminController@delete_part_product');

    //part routes
    Route::post('/add_part',                'AdminController@add_part');
    Route::post('/edit_part',               'AdminController@edit_part');
    Route::post('/delete_part',             'AdminController@delete_part');
    Route::post('/delete_part_photo',       'AdminController@delete_part_photo');

    //option routes
    Route::post('/add_option',              'AdminController@add_option');
    Route::post('/edit_option',             'AdminController@edit_option');
    Route::post('/delete_option',           'AdminController@delete_option');
    Route::post('/delete_option_photo',     'AdminController@delete_option_photo');

    //language routes
    Route::post('/add_language',            'AdminController@add_language');
    Route::post('/delete_language',         'AdminController@delete_language');

    //actualities routes
    Route::post('/add_actualities',         'AdminController@add_actualities');
    Route::post('/edit_actualities',        'AdminController@edit_actualities');
    Route::post('/delete_actualities',      'AdminController@delete_actualities');
    Route::post('/delete_actualities_photo','AdminController@delete_actualities_photo');

});
