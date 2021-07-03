<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\Auth\AuthController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\Ship\ParcelStationController;
use App\Http\Controllers\Admin\Ship\ParcelCategoryController;
use App\Http\Controllers\Admin\Ship\EnvelopeQrCodeController;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register admin routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group([
    'middleware' => ['guest'],
    'prefix' => 'admin'
], function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/login', [AuthController::class, 'login']);

    Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('admin.register');
    Route::post('/register', [AuthController::class, 'register']);
});

Route::group([
    'middleware' => ['auth:admin'],
    'prefix' => 'admin'
], function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('admin.logout');
    Route::get('/dashboard', [HomeController::class, 'index'])->name('admin.dashboard');

    Route::get('/profile', [ProfileController::class, 'index'])->name('admin.profile');
    Route::post('/profile-pic-change', [ProfileController::class, 'ChangePic']);

    // Ship
    Route::resource('/parcel_station', ParcelStationController::class, ['as' => 'ship']);
    Route::resource('/parcel_category', ParcelCategoryController::class, ['as' => 'ship']);
    Route::resource('/envelope_qrcode', EnvelopeQrCodeController::class, ['as' => 'ship']);
});
