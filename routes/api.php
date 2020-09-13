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

Route::prefix('v1')->group(function () {
Route::apiResource('brands','Api\BrandController');
Route::apiResource('categories','Api\CategoryController');
Route::apiResource('subcategories','Api\SubcategoryController');
Route::apiResource('items','Api\ItemController');
Route::post('register','Api\AuthController@register')->name('register');
Route::apiResource('users','Api\UserController');
Route::get('filter_item/{sid}/{bid}','Api\ItemController@filter')->name('filter_item');
Route::get('search_item','Api\ItemController@search');
Route::get('itemByBrand','Api\ItemController@byBrand')->name('itemByBrand');

  Route::get('itemBySubcategory','Api\ItemController@bySubcategory')->name('itemBySubcategory');

Route::apiresource('orders','Api\OrderController');

});


