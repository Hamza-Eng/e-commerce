<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('public.index');
});
Route::get('/detail', function () {
    return view('public.detail');
});
Route::get('/checkout', function () {
    return view('public.checkout');
});
Route::get('/shop', function () {
    return view('public.shop');
});

