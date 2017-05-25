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

Route::get('/', ['as' => 'main_page','uses' => 'MainPageController@indexAction']);

Route::get('/category/{cat_id}', ['as' => 'all_prod_from_cat', 'uses' => 'ProductsController@showAllProductsFromCat']);

Route::get('/about', ['as' => 'about_page', 'uses' => 'AboutPageController@showAboutPage']);

Route::get('/facility', ['as' => 'facility', 'uses' => 'FacilityPageController@showFacilityPage']);

Route::match(['get', 'post'], '/contacts', ['as' => 'contacts', 'uses' => 'ContactPageController@showContactPage']);

Route::get('/cart', ['as' => 'cart', 'uses' => 'CartController@showCart']);

Route::get('/cart/addtocart/{prod_id}', ['as' => 'addToCart', 'uses' => 'CartController@addtocart']);

Route::get('/cart/removefromcart/{product_id}', ['as' => 'removefromCart', 'uses' => 'CartController@removefromcart']);

Route::post('/cart/saveorder', ['as' => 'saveorder', 'uses' => 'CartController@saveorder']);

Route::post('/contact/contactUs', ['as' => 'contactUs', 'uses' => 'ContactPageController@sendMail']);
//capcha
Route::get('/get_captcha/{config?}', function (\Mews\Captcha\Captcha $captcha, $config = 'default') {
    return $captcha->src($config);
});

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::group(['prefix'=>'admin'], function(){

    Route::get('/','AdminController@index');
    Route::get('/login',['as' => 'admin.login','uses' => 'AuthAdmin\LoginController@showLoginForm']);
    Route::post('/login',['uses' => 'AuthAdmin\LoginController@login']);
    Route::get('/logout',['as' => 'admin.logout','uses' => 'AuthAdmin\LoginController@logout']);
    Route::match(['get', 'post'], '/add-category', ['as'=>'admin-add-cat', 'uses' => 'AdminController@add_category']);
    Route::match(['get', 'post'], '/add-product', ['as'=>'admin-add-product', 'uses' => 'AdminController@add_product']);
    Route::match(['get', 'post'], '/show-products', ['as'=>'admin-show-products', 'uses' => 'AdminController@show_products']);
    Route::match(['get', 'post'], '/change_products_status/{prod_id}', ['as'=>'change-products-status', 'uses' => 'AdminController@change_products_status']);
    Route::match(['get', 'post'], '/change_product_price/{prod_id}/{new_price}', ['as'=>'change-products-price', 'uses' => 'AdminController@change_product_price']);
    Route::get('/orders/{status}',['as' => 'orders','uses' => 'AdminController@show_orders']);

});
