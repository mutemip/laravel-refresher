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
    return "Hello there!!";
});
Route::get("/hello", function () {
    return "This is hello page.";
})->name("hello-route"); //naming routes

// retiring a url
Route::get("/helo", function () {
    return redirect()->route("hello-route"); //redirecting to named route
});

Route::get("/greet/{name}/", function ($name) {
    return "Hello " . $name . "!";
});

Route::get("/private", function () {
    return "Made repo Private!!";
});