<?php

use App\Http\Controllers\Admin\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Admin\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Admin\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Admin\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Admin\Auth\NewPasswordController;
use App\Http\Controllers\Admin\Auth\PasswordController;
use App\Http\Controllers\Admin\Auth\PasswordResetLinkController;
use App\Http\Controllers\Admin\Auth\RegisteredUserController;
use App\Http\Controllers\Admin\Auth\VerifyEmailController;
use App\Http\Controllers\Admin\CityController;
use App\Http\Controllers\Admin\CountryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\IndustryTypeController;
use App\Http\Controllers\Admin\LanguageController;
use App\Http\Controllers\Admin\LocationController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\OrganizationTypeController;
use App\Http\Controllers\Admin\PaymentSettingController;
use App\Http\Controllers\Admin\PlanController;
use App\Http\Controllers\Admin\ProfessionController;
use App\Http\Controllers\Admin\SiteSettingController;
use App\Http\Controllers\Admin\SkilController;
use App\Http\Controllers\Admin\StateController;
use App\Models\Order;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['guest:admin'], 'prefix' => 'admin', 'as' => 'admin.'],function () {

    Route::get('login', [AuthenticatedSessionController::class, 'create'])
                ->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store']);

    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
                ->name('password.request');

    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
                ->name('password.email');

    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
                ->name('password.reset');

    Route::post('reset-password', [NewPasswordController::class, 'store'])
                ->name('password.store');
});

Route::group(['middleware' => ['auth:admin'], 'prefix' => 'admin', 'as' => 'admin.'],function () {

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::put('password', [PasswordController::class, 'update'])->name('password.update');

    Route::resource('industry-type', IndustryTypeController::class);

    Route::resource('organization-type', OrganizationTypeController::class);

    Route::resource('countries', CountryController::class);

    Route::resource('states', StateController::class);

    Route::resource('cities', CityController::class);

    Route::get('get-states/{country_id}', [LocationController::class, 'getStatesOfCountry'])->name('get-states');

    Route::resource('languages', LanguageController::class);

    Route::resource('professions', ProfessionController::class);

    Route::resource('skills', SkilController::class);

    Route::resource('plans', PlanController::class);

    Route::get('orders', [OrderController::class, 'index'])->name('orders.index');

    Route::get('order/{id}', [OrderController::class, 'show'])->name('orders.show');

    Route::get('order/invoice/{id}', [OrderController::class, 'invoice'])->name('orders.invoice');

    Route::get('payment-settings', [PaymentSettingController::class, 'index'])->name('payment-settings.index');

    Route::post('paypal-settings', [PaymentSettingController::class, 'updatePaypalSetting'])->name('paypal-settings.update');

    Route::post('stripe-settings', [PaymentSettingController::class, 'updateStripeSetting'])->name('stripe-settings.update');

    Route::get('site-settings', [SiteSettingController::class, 'index'])->name('site-settings.index');

    Route::post('general-settings', [SiteSettingController::class, 'updateGeneralSetting'])->name('general-settings.update');


});
