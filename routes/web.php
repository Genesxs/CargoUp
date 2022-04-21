<?php

use App\Http\Controllers\LocaleController;

/*
 * Global Routes
 *
 * Routes that are used between both frontend and backend.
 */

// Switch between the included languages
Route::get('lang/{lang}', [LocaleController::class, 'change'])->name('locale.change');

/*
 * Frontend Routes
 */
Route::group(['as' => 'frontend.'], function () {
    includeRouteFiles(__DIR__ . '/frontend/');
});

/*
 * Backend Routes
 *
 * These routes can only be accessed by users with type `admin`
 */
Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
    includeRouteFiles(__DIR__ . '/backend/');
});


//Frontend

Route::group(['middleware' => 'auth'], function () {

    //users
    Route::name('indexOwnerD')->get('OwnerDriver', [App\Http\Controllers\Frontend\UserController::class, 'indexOwnerDriver']);
    Route::name('indexOwner')->get('Owner', [App\Http\Controllers\Frontend\UserController::class, 'indexOwner']);
    Route::name('indexDriver')->get('Driver', [App\Http\Controllers\Frontend\UserController::class, 'indexDriver']);

    //owners
    Route::name('showOwDriver')->get('MyDrivers', [App\Http\Controllers\Frontend\OwnerController::class, 'showOwDriver']);
    Route::name('showVehicle')->get('showVehicle', [App\Http\Controllers\Frontend\OwnerController::class, 'showVehicle']);

    Route::name('selectDriver')->get('selectDriver', [App\Http\Controllers\Frontend\OwnerController::class, 'showDriver']);
    Route::name('storeDriver')->get('selectDriver/{id}', [App\Http\Controllers\Frontend\OwnerController::class, 'storeDriver']);
    Route::name('removeDriver')->get('removeDriver/{id}', [App\Http\Controllers\Frontend\OwnerController::class, 'removeDriver']);

    Route::name('creditPayment')->get('creditPayment', [App\Http\Controllers\Frontend\OwnerController::class, 'creditPayment']);
    Route::name('cashPayment')->get('cashPayment', [App\Http\Controllers\Frontend\OwnerController::class, 'cashPayment']);

    Route::name('upPetition')->post('paymentVehicle/upPetition', [App\Http\Controllers\Frontend\OwnerController::class, 'upPetition']);
    Route::name('documentApproved')->post('paymentVehicle/documentApproved', [App\Http\Controllers\Frontend\OwnerController::class, 'upDocument']);

    Route::name('download')->get('creditPayment/download', [App\Http\Controllers\Frontend\OwnerController::class, 'download']);

    //driver

    Route::name('showDriver')->get('registerDriver', [App\Http\Controllers\Frontend\DriverController::class, 'driver']);
    Route::name('registerDriver')->post('registerDriver', [App\Http\Controllers\Frontend\DriverController::class, 'storeDriver']);

    Route::name('downloadC')->get('registerDriver/download', [App\Http\Controllers\Frontend\DriverController::class, 'downloadCurriculum']);

    //Guide 
    Route::name('indexService')->get('Service', [App\Http\Controllers\Frontend\GuideController::class, 'indexService']);
    Route::name('indexGuideDes')->get('guide-destination', [App\Http\Controllers\Frontend\GuideController::class, 'indexGuideDes']);
    Route::name('guide-query')->get('guide-query', [App\Http\Controllers\Frontend\GuideController::class, 'index']);
    Route::name('payment-guide')->get('payment-guide', [App\Http\Controllers\Frontend\GuideController::class, 'showPaymentGuide']);

    Route::name('storeOrigin')->post('storeOrigin', [App\Http\Controllers\Frontend\GuideController::class, 'storeOrigin']);
    Route::name('storeGuide')->get('storeGuide', [App\Http\Controllers\Frontend\GuideController::class, 'storeGuide']);
    Route::name('storeGuideDestiny')->post('storeGuideDestiny', [App\Http\Controllers\Frontend\GuideController::class, 'storeGuideDestiny']);
    Route::name('storePaymentGuide')->post('storePaymentGuide', [App\Http\Controllers\Frontend\GuideController::class, 'storePaymentGuide']);

    Route::name('showEvidence')->get('payment-guide/{id}', [App\Http\Controllers\Frontend\GuideController::class, 'showEvidence']);
    Route::name('storeEvidence')->post('store-evidence', [App\Http\Controllers\Frontend\GuideController::class, 'storeEvidence']);
});

//Guide

Route::group(['middleware' => 'role:' . config('boilerplate.access.role.admin')], function () {
    Route::name('backend.guides.index')->get('guides', [App\Http\Controllers\Backend\Guidecontroller::class, 'index']);
    Route::name('backend.guides.search')->get('guides/search', [App\Http\Controllers\Backend\Guidecontroller::class, 'searchGuide']);
    Route::name('backend.guides.download')->get('guides/download/{id}', [App\Http\Controllers\Backend\Guidecontroller::class, 'download']);
    Route::name('backend.guides.update')->get('guides/{id}', [App\Http\Controllers\Backend\Guidecontroller::class, 'update']);
    Route::name('backend.guides.assing')->get('guides/assing-driver/{id}', [App\Http\Controllers\Backend\Guidecontroller::class, 'findGuide']);
});

//Backend

Route::group(['prefix' => 'backend', 'middleware' => 'role:' . config('boilerplate.access.role.admin')], function () {
    Route::resource('documentTypes', App\Http\Controllers\Backend\DocumentTypeController::class, ["as" => 'backend']);
    Route::resource('genders', App\Http\Controllers\Backend\GenderController::class, ["as" => 'backend']);
    Route::resource('departments', App\Http\Controllers\Backend\DepartmentController::class, ["as" => 'backend']);
    Route::resource('municipalities', App\Http\Controllers\Backend\MunicipalityController::class, ["as" => 'backend']);
    Route::resource('discounts', App\Http\Controllers\Backend\DiscountController::class, ["as" => 'backend']);
    Route::resource('ivas', App\Http\Controllers\Backend\IvaController::class, ["as" => 'backend']);
    Route::resource('banks', App\Http\Controllers\Backend\BankController::class, ["as" => 'backend']);
    Route::resource('typeVehicles', App\Http\Controllers\Backend\TypeVehicleController::class, ["as" => 'backend']);
    Route::resource('quotas', App\Http\Controllers\Backend\QuotaController::class, ["as" => 'backend']);
    Route::resource('vehicles', App\Http\Controllers\Backend\VehicleController::class, ["as" => 'backend']);
    Route::resource('typeAccounts', App\Http\Controllers\Backend\TypeAccountController::class, ["as" => 'backend']);
});
