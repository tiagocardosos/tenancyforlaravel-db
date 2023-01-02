<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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


Route::controller(\App\Http\Controllers\RegisterTenantController::class)
    ->name('tenant.')
    ->group(function () {
        Route::get('register', 'register')->name('form');
        Route::post('register', 'store')->name('register');
    });
//require __DIR__.'/auth.php';
