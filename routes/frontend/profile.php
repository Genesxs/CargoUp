<?php


Route::group(['middleware' => ['auth', 'password.expires', config('boilerplate.access.middleware.verified')]], function () {

 Route::get('typedocuments/gettypedocuments',[App\Http\Controllers\Backend\DocumentTypeController::class, 'getTypeDocuments'])->name('typedocuments.gettypedocuments');

 Route::get('departments/getdepartments',[App\Http\Controllers\Backend\DepartmentController::class, 'getdepartments'])->name('departments.getdepartments');
 
 Route::get('municipalities/getmunicipalities',[App\Http\Controllers\Backend\MunicipalityController::class, 'getMunicipalities'])->name('municipalities.getmunicipalities');

 Route::get('municipalitiesfordpt/getmunicipalitiesfordpt',[App\Http\Controllers\Backend\MunicipalityController::class, 'getMunicipalitiesfordpt'])->name('municipalities.getmunicipalitiesfordpt');
 
 Route::get('genders/getgenders',[App\Http\Controllers\Backend\GenderController::class, 'getGenders'])->name('genders.getgenders'); 

});