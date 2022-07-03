<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('welcome');
});

Route::get('/thang', function () {
    return view('welcome');
});

Route::get('/callingapi', function () {
    return view('welcome');
});

Route::get('/modal', function () {
    return view('welcome');
});

// Route::view('/{any}', 'welcome')
//     ->where('any', '.*');

Route::resource('products', ProductController::class);





