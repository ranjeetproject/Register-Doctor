<?php

// Route::group(['namespace' => 'patient',"prefix"=>"patient",'middleware' => ['isPatient:sitePatient','activeUser','emailVerified']], function() {

	Route::middleware(['isPatient:sitePatient','activeUser','emailVerified'])->namespace('patient')->prefix('patient')->name('patient.')->group(function(){
    Route::get('/dashboard', 'PatientController@dashboard')->name('dashboard');
    Route::match(['get','post'],'/profile', 'PatientController@profile')->name('profile');
    Route::match(['get','post'],'/change-password', 'PatientController@changePassword')->name('change-password');
    Route::match(['get','post'],'/save-cases', 'PatientController@saveCases')->name('save-cases');

    Route::match(['get','post'],'/create-case', 'PatientController@createCase')->name('create-case');

    Route::match(['get','post'],'/medical-record', 'PatientController@medicalRecord')->name('medical-record');
    Route::match(['get','post'],'/my-favorite-doctors', 'PatientController@myFavoriteDoctors')->name('my-favorite-doctors');

    Route::match(['get','post'],'/add-to-favorite', 'PatientController@addToFavorite')->name('add-to-favorite');

    Route::match(['get','post'],'/requested-consults', 'PatientController@requestedConsults')->name('requested-consults');
    Route::match(['get','post'],'/closed-cases', 'PatientController@closedCases')->name('closed-cases');
    Route::match(['get','post'],'/prescriptions-issued', 'PatientController@prescriptionsIssued')->name('prescriptions-issued');
    Route::match(['get','post'],'/pharmacies', 'PatientController@pharmacies')->name('pharmacies');
});
