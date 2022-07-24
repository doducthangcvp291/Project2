<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\EventController;


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

//Route::get('/usersl',[UserController::class,'showList']);
Route::prefix('/users')->group(function(){
    Route::post('/store',[UserController::class,'store']);
    Route::get('/list',[UserController::class,'showList']);

});

//Route::get('/event', 'EventController@getEvents');

// Route::prefix('/products')->group(function(){
//     Route::post('/',[ProductController::class,'store']);
//     Route::get('/',[ProductController::class,'index']);

// });

Route::resource('products', ProductController::class);
Route::resource('events', EventController::class);
