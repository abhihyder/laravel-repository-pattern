<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\Ship\ParcelAttributesController;
use App\Http\Controllers\Api\AddressBookController;
use App\Http\Controllers\Api\PlaceController;
use App\Http\Controllers\Api\Ship\SearchNearestStore;
use App\Http\Controllers\Api\Ship\CreateParcel;

Route::post('exchange', [AuthController::class, 'exchangeToken']);

Route::group([
    'middleware' => ['jwt.verify'],
    'prefix' => 'v1/ship-parcel-attr'
], function () {
    Route::get('get-categories', [ParcelAttributesController::class, 'getCategories']);
    Route::get('get-price/{category}/{from}/{to}', [ParcelAttributesController::class, 'getPrice']);
});

Route::group([
    'middleware' => ['jwt.verify'],
    'prefix' => 'v1/ship-parcel-store'
], function () {
    Route::get('nearest-stores', SearchNearestStore::class);
});

Route::group([
    'middleware' => ['jwt.verify'],
    'prefix' => 'v1/address-book'
], function () {
    Route::post('store', [AddressBookController::class, 'store']);
    Route::patch('update/{id}', [AddressBookController::class, 'update']);
    Route::get('get-addresses/{isSelf}', [AddressBookController::class, 'getAddresses']);
    Route::delete('delete/{id}', [AddressBookController::class, 'delete']);
    Route::get('trashed', [AddressBookController::class, 'trashed']);
    Route::patch('restore/{id}', [AddressBookController::class, 'restore']);
});

Route::group([
    'middleware' => ['jwt.verify'],
    'prefix' => 'v1/place'
], function () {
    Route::get('all-country', [PlaceController::class, 'getAllCountry']);
    Route::get('fixed-country', [PlaceController::class, 'getFixedCountry']);
    Route::any('search-country', [PlaceController::class, 'searchCountry']);
    Route::get('states-of-country/{countryId}', [PlaceController::class, 'getStatesOfCountry']);
    Route::get('cities-of-state/{stateId}', [PlaceController::class, 'getCitiesOfState']);
});

Route::group([
    'middleware' => ['jwt.verify'],
    'prefix' => 'v1/ship-parcel'
], function () {
    Route::post('create', CreateParcel::class);
});
