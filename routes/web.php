<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JenisSampahController;
use App\Http\Controllers\HitungSampahController;

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

Route::resource('hitungsampah', HitungSampahController::class);

Auth::routes();

Route::resource('jenissampah', JenisSampahController::class);

