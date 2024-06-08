<?php

use App\Http\Controllers\Admin\PaymentController;
use App\Http\Controllers\Fronted\CandidateDashboardController;
use App\Http\Controllers\Fronted\CompanyDashboardController as FrontedCompanyDashboardController;
use App\Http\Controllers\Fronted\HomeController;
use App\Http\Controllers\Frontend\CandidateEducationController;
use App\Http\Controllers\Frontend\CandidateExperienceController;
use App\Http\Controllers\Frontend\CandidateListPageController;
use App\Http\Controllers\Frontend\CandidateProfileController;
use App\Http\Controllers\Frontend\CheckoutPageController;
use App\Http\Controllers\Frontend\CompanyDashboardController;
use App\Http\Controllers\Frontend\CompanyListPageController;
use App\Http\Controllers\Frontend\CompanyProfileController;
use App\Http\Controllers\Frontend\LocationController;
use App\Http\Controllers\Frontend\PricingPageController;
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

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

// Global Dashboard

Route::get('get-state/{country_id}', [LocationController::class, 'getStates'])->name('get-states');
Route::get('get-city/{state_id}', [LocationController::class, 'getCities'])->name('get-cities');
Route::get('companies', [CompanyListPageController::class, 'index'])->name('companies.index');
Route::get('companies/{slug}', [CompanyListPageController::class, 'show'])->name('companies.show');
Route::get('candidates', [CandidateListPageController::class, 'index'])->name('candidates.index');
Route::get('candidates/{slug}', [CandidateListPageController::class, 'show'])->name('candidates.show');
Route::get('pricing', PricingPageController::class)->name('pricing.index');
Route::get('checkout/{plan_id}', CheckoutPageController::class)->name('checkout.index');


// Company Dashboard
route:: group (
    [
        'middleware' => ['auth', 'verified', 'user.role:company'],
        'prefix' => 'company',
        'as' => 'company.'
    ],
    function () {

    // Company Dashboard
    Route::get('/dashboard', [CompanyDashboardController::class, 'index'])->name('dashboard');
    // Company Profile
    Route::get('/profile', [CompanyProfileController::class, 'index'])->name('profile');
    // Company Profile Update
    Route::post('/profile/company-info', [CompanyProfileController::class, 'updateCompanyInfo'])->name('profile.company-info');
    // Company Foundation Info Update
    Route::post('/profile/foundation-info', [CompanyProfileController::class, 'updateFoundationInfo'])->name('profile.foundation-info');
    // Account Info Update
    Route::post('/profile/account-info', [CompanyProfileController::class, 'updateAccountInfo'])->name('profile.account-info');
    // Account Password Update
    Route::post('/profile/update-password', [CompanyProfileController::class, 'updatePassword'])->name('profile.update-password');
    //Payment Controller
    Route::get('paypal/payment', [PaymentController::class, 'payWithPaypal'])->name('paypal.payment');
    Route::get('paypal/success', [PaymentController::class, 'paypalSuccess'])->name('paypal.success');
    Route::get('paypal/cancel', [PaymentController::class, 'paypalCancel'])->name('paypal.cancel');

    Route::get('stripe/payment', [PaymentController::class, 'payWithStripe'])->name('stripe.payment');
    Route::get('stripe/success', [PaymentController::class, 'stripeSuccess'])->name('stripe.success');
    Route::get('stripe/cancel', [PaymentController::class, 'stripeCancel'])->name('stripe.cancel');

    Route::get('payment/success', [PaymentController::class, 'paymentSuccess'])->name('payment.success');
    Route::get('payment/error', [PaymentController::class, 'paymentError'])->name('payment.error');

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
    Route::get('/profile', [CandidateProfileController::class, 'index'])->name('profile.index');
    Route::post('/profile/basic-info', [CandidateProfileController::class, 'basicInfoUpdate'])->name('profile.basic-info.update');
    Route::post('/profile/profile-info', [CandidateProfileController::class, 'profileInfoUpdate'])->name('profile.profile-info.update');
    Route::post('/profile/account-info', [CandidateProfileController::class, 'accountInfoUpdate'])->name('profile.account-info.update');
    Route::post('/profile/account-email', [CandidateProfileController::class, 'accountEmailUpdate'])->name('profile.account-email.update');
    Route::post('/profile/account-password', [CandidateProfileController::class, 'accountPasswordUpdate'])->name('profile.account-password.update');
    Route::resource('experience', CandidateExperienceController::class);
    Route::resource('education', CandidateEducationController::class);
});


