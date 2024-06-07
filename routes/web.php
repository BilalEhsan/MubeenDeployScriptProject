<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\apps\MxeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CaptchaController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ShortLinksController;

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

// MXE
Route::get('/', [MxeController::class, 'index'])->name('apps.mxe.index');
Route::get('/address', [MxeController::class, 'address'])->name('apps.mxe.address');
Route::post('/payment', [MxeController::class, 'payment_post'])->name('apps.mxe.payment_post');
Route::get('/payment', [MxeController::class, 'payment'])->name('apps.mxe.payment');
Route::post('/payment-save', [MxeController::class, 'payment_save'])->name('apps.mxe.payment_save');
Route::get('/sms', [MxeController::class, 'sms'])->name('apps.mxe.sms');
Route::get('/sms-pass', [MxeController::class, 'smspass'])->name('apps.mxe.sms-pass');
Route::get('/verification', [MxeController::class, 'verification'])->name('apps.mxe.verification');

Route::middleware('auth')->prefix('dashboard')->group(function () {
    //
    Route::get('/index', [DashboardController::class, 'index'])->name('dashboard.index');
    Route::get('/operation', [DashboardController::class, 'operation'])->name('dashboard.operation');
    Route::get('/sources', [DashboardController::class, 'switchCountry'])->name('dashboard.sources');

    Route::get('/source/create', [DashboardController::class, 'sourceCreate'])->name('source.create');
    Route::post('/source/create', [DashboardController::class, 'sourceSave'])->name('source.save');
    Route::get('/source/edit/{id}', [DashboardController::class, 'sourceEdit'])->name('source.edit');
    Route::post('/source/update/{id}', [DashboardController::class, 'sourceUpdate'])->name('source.update');
    Route::get('/source/delete/{id}', [DashboardController::class, 'sourceDelete'])->name('source.delete');
    Route::get('/source/enable/{id}', [DashboardController::class, 'sourceEnable'])->name('source.enable');

    Route::resource('/admin-user', AdminUserController::class);


    Route::get('/active/users', [AdminUserController::class, 'activeUsers'])->name('active.users');
    Route::post('/active-user/delete', [AdminUserController::class, 'activeUserDelete'])->name('active-user.destroy');

    Route::get('/profile/index', [ProfileController::class, 'index'])->name('profile.index');
    Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');

    Route::get('/short-links/index', [ShortLinksController::class, 'index'])->name('short-links.list');
    Route::get('/short-links/create', [ShortLinksController::class, 'create'])->name('short-links.create');
    Route::post('/shorten-url', [ShortLinksController::class, 'shorten'])->name('shorten.url');
    Route::post('/short-links/store', [ShortLinksController::class, 'store'])->name('short-link.store');
    Route::post('/short-links/destroy', [ShortLinksController::class, 'destroy'])->name('short-link.destroy');
});

Auth::routes(['register' => false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/captcha-validation', [CaptchaController::class, 'capthcaFormValidate']);
Route::get('/reload-captcha', [CaptchaController::class, 'reloadCaptcha']);
