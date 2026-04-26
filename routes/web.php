<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\UrlController;
use App\Http\Controllers\UserController;


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
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Company list
    Route::get('/companies', [CompanyController::class, 'index'])->name('companies.index');

    // Create form
    Route::get('/companies/create', [CompanyController::class, 'create'])->name('companies.create');

    // Store (submit form)
    Route::post('/companies', [CompanyController::class, 'store'])->name('companies.store');

    // Url list
    Route::get('/urls', [UrlController::class, 'index'])->name('urls.index');

    // Create Url form
    Route::get('/urls/create', [UrlController::class, 'create'])->name('urls.create');

    // Store (submit form)
    Route::post('/urls', [UrlController::class, 'store'])->name('urls.store');
    // Url list
    Route::get('/users', [UserController::class, 'index'])->name('users.index');

    // Create Url form
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');

    // Store (submit form)
    Route::post('/users', [UserController::class, 'store'])->name('users.store');


});

Route::get('/r/{code}', [UrlController::class, 'redirect']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
