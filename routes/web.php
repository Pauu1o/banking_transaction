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

<<<<<<< HEAD
=======
Route::get('/admin', function () {
    return view('admin.index');
})->name('admin.index');

>>>>>>> 500a0d69a122f449bdbd86f2efe1d6903730d04b
Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard/content');
});

Route::get('/settings', function () {
    return view('settings/content');
});

Route::get('/contact', function () {
    return view('contact/content'); //path of your view file
});




require __DIR__.'/auth.php';