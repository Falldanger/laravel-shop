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

Auth::routes([
    'reset' => false,
    'confirm' => false,
    'verify' => false,
]);

Route::get('locale/{locale}', 'MainController@changeLocale')->name('locale');
Route::get('currency/{currencyCode}', 'MainController@changeCurrency')->name('currency');

Route::get('reset', 'ResetController@reset')->name('reset');

Route::get('/logout', 'Auth\LoginController@logout')->name('get-logout');

Route::middleware(['set_locale'])->group(function () {

    Route::middleware(['auth'])->group(function () {
        Route::group([
            'prefix' => 'person',
            'namespace' => 'Person',
            'as' => 'person.',
        ], function () {
            Route::get('/orders', 'OrderController@index')->name('orders.index');
            Route::get('/orders/{order}', 'OrderController@show')->name('orders.show');
        });

        Route::group([
            'namespace' => 'Admin',
            'prefix' => 'admin',
        ], function () {
            Route::group(['middleware' => 'is_admin'], function () {
                Route::get('/orders', 'OrderController@index')->name('home');
                Route::get('/orders/{order}', 'OrderController@show')->name('orders.show');
            });

            Route::resource('categories', 'CategoryController');
            Route::resource('products', 'ProductController');
            Route::resource('properties', 'PropertyController');
            Route::resource('properties/{property}/property-options', 'PropertyOptionController');

        });
    });


    Route::get('/', 'MainController@index')->name('index');
    Route::get('/categories', 'MainController@categories')->name('categories');
    Route::post('/subscription/{product}', 'MainController@subscribe')->name('subscription');


    Route::group(['prefix' => 'basket'], function () {
        Route::post('/add/{product}', 'BasketController@basketAdd')->name('basket-add');

        Route::group([
            'middleware' => 'basket_not_empty',
        ], function () {
            Route::get('/', 'BasketController@basket')->name('basket');
            Route::get('/place', 'BasketController@basketPlace')->name('basket-place');
            Route::post('/remove/{product}', 'BasketController@basketRemove')->name('basket-remove');
            Route::post('/place', 'BasketController@basketConfirm')->name('basket-confirm');
        });
    });


    Route::get('/{category}', 'MainController@category')->name('category');
    Route::get('/{category}/{product?}', 'MainController@product')->name('product');
});
