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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
// Company Details
Route::get('/company-details/1', 'apiController@getCompanyDetails');
Route::get('/stock-group', 'apiController@getStockGroup');
Route::get('/item-group', 'apiController@getItemGroup');
Route::get('/inventory-item', 'apiController@getInventoryItem');
Route::post('/ignore-post', 'apiController@ignorePost');
