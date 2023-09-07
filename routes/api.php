<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::group(['prefix' => 'brands'], function () {
    Route::get('/', 'App\Http\Controllers\API\BrandController@index');
    Route::get('/{brand}', 'App\Http\Controllers\API\BrandController@show');
    Route::put('/create', 'App\Http\Controllers\API\BrandController@store');
    Route::patch('/update/{brand}', 'App\Http\Controllers\API\BrandController@update');
    Route::delete('/delete/{brand}', 'App\Http\Controllers\API\BrandController@destroy');
});

Route::group(['prefix' => 'products'], function () {
    Route::get('/', 'App\Http\Controllers\API\ProductController@index');
    Route::get('/{product}', 'App\Http\Controllers\API\ProductController@show');
    Route::put('/create', 'App\Http\Controllers\API\ProductController@store');
    Route::patch('/update/{product}', 'App\Http\Controllers\API\ProductController@update');
    Route::delete('/delete/{product}', 'App\Http\Controllers\API\ProductController@destroy');
});

Route::group(['prefix' => 'clients'], function () {
    Route::get('/', 'App\Http\Controllers\API\ClientController@index');
    Route::get('/{client}', 'App\Http\Controllers\API\ClientController@show');
    Route::put('/create', 'App\Http\Controllers\API\ClientController@store');
    Route::patch('/update/{client}', 'App\Http\Controllers\API\ClientController@update');
    Route::delete('/delete/{client}', 'App\Http\Controllers\API\ClientController@destroy');
});

Route::group(['prefix' => 'sales'], function () {
    Route::get('/', 'App\Http\Controllers\API\SaleController@index');
    Route::get('/{sale}', 'App\Http\Controllers\API\SaleController@show');
    Route::put('/create', 'App\Http\Controllers\API\SaleController@store');
    Route::patch('/update/{sale}', 'App\Http\Controllers\API\SaleController@update');
    Route::delete('/delete/{sale}', 'App\Http\Controllers\API\SaleController@destroy');
});
