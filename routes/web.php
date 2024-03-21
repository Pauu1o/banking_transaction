<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PhonebookController;

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
// Route definition in Laravel
Route::get('/phonebook', [PhonebookController::class, 'index'])->name('phonebook.index');

Route::get('/phonebook/filter', [PhonebookController::class, 'filter'])->name('phonebook.filter');

Route::get('/transactions', function () {
    $referenceCode = request()->input('reference_code');
    
    // Step 3: Server-Side Filtering
    $filteredTransactions = Phonebook::where('reference_code', $referenceCode)->get();

    // Step 4: Return Filtered Data
    return response()->json($filteredTransactions);
});

Route::get('/admin', function () {
    return view('admin.index');
})->name('admin.index');

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