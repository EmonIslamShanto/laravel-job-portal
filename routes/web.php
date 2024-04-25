<?php

use App\Http\Controllers\Fronted\CandidateDashboardController;
use App\Http\Controllers\Fronted\CompanyDashboardController as FrontedCompanyDashboardController;
use App\Http\Controllers\Fronted\HomeController;
use App\Http\Controllers\Frontend\CompanyDashboardController;
use App\Http\Controllers\ProfileController;
use Faker\Provider\ar_EG\Company;
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

Route::get('/', [HomeController::class, 'index']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

// Company Dashboard
route:: group (
    [
        'middleware' => ['auth', 'verified', 'user.role:company'],
        'prefix' => 'company',
        'as' => 'company.'
    ],
    function () {

    Route::get('/dashboard', [FrontedCompanyDashboardController::class, 'index'])->name('dashboard');
});

// Candidate Dashboard
route:: group (
    [
        'middleware' => ['auth', 'verified', 'user.role:candidate'],
        'prefix' => 'candidate',
        'as' => 'candidate.'
    ],
    function () {

    Route::get('/dashboard', [CandidateDashboardController::class, 'index'])->name('dashboard');
});


