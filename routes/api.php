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
Route::post('login', 'API\UserController@login');
Route::post('register', 'API\UserController@register');
//Route::post('store', 'API\QRScanController@store');
//Route::post('store/checkin', 'API\CheckInController@storeCheckin');
Route::get('view/checkin/{token}', 'API\CheckInController@viewCheckin');

Route::group(['middleware' => 'auth:api'], function(){
    Route::post('store/checkin', 'API\CheckInController@storeCheckin');
    Route::post('store', 'API\QRScanController@store');
    Route::post('details', 'API\UserController@details');
    Route::get('view/checkin', 'API\CheckInController@viewCheckin');
    Route::get('today/checkin', 'API\CheckInController@todayCheckins');
});
