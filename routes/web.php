<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CommandeController;
use App\Http\Controllers\ProductController;
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


Route::fallback(function () {
    return redirect()->route("home");
    // return view('public.index');
});

Route::prefix('public')->group(function () {
    Route::get('/home', function () {return view('public.index');})->name("home");

    Route::get('/checkout', function () {return view('public.checkout');})->name("checkout");

    Route::get('/shop', function () {return view('public.shop');})->name("shop");
    //just for test
    // Route::get('/product', function () {return view('public.product');})->name("product");

    Route::get("/product/{id}", [ProductController::class, "showOne"])->name("product");

    Route::get("/product/all", [ProductController::class, "showAll"])->name("Allproduct");

    Route::get("/categorie/{categorie}", [ProductController::class, "showAll"])->name("categorie");

    Route::get('/checkout', [CommandeController::class, "show"])->name("checkout");

    Route::post('/checkout', [CommandeController::class, "create"])->name("checkout");
});

Route::prefix('adminAreasGnHwQU2utgBTZHcVk9XEfuVa5gHXC7TehuuHr2vIFEFciQO0vjF4eH1Sw8lUOix23WWAf0TgSCMuqgn3AIe63C2OWO5MVr2mMzy')->group(function () {
    Route::get("/", [AdminController::class, "show"])->name("admin_home");
    Route::get("/addNewProduct", function () {return view("admin.add_product");})->name("AddProduct");
    Route::post("/addNewProduct", [ProductController::class, "create"])->name("AddProduct");
    Route::get('/confirme/{id}', [CommandController::class, "confirme"])->name("confirme");
});
