<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::get('/orders/{id}','OrdersController@fetchOrderData');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/product-lines', 'Products\ProductLineController@allProductLines'); // all product lines

Route::group(['prefix' => 'products'], function() {
    Route::get('/', 'Products\ProductController@allProducts'); // all products (Optional Param: 'productLine') ==> ?productLine=Planes
    Route::get('/{productCode}', 'Products\ProductController@productDetails'); // product details
});

Route::group(['prefix' => 'orders'], function() {
    Route::get('/', 'OrdersController@allOrders');
    Route::get('/{id}', 'OrdersController@fetchOrderData');
});