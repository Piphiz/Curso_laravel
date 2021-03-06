<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProviderController;
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
    return redirect()->route('product.index');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::any('/register', function() {
    return redirect()->route('product.index');
});

require __DIR__.'/auth.php';

Route::middleware(['auth'])->group(function(){
    Route::resource('user', UserController::class);
    Route::resource('product', ProductController::class);
    Route::resource('provider', ProviderController::class);
});
