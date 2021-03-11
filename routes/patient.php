<?php

// Route::group(['namespace' => 'patient',"prefix"=>"patient",'middleware' => ['isPatient:sitePatient','activeUser','emailVerified']], function() {

	Route::middleware(['isPatient:sitePatient','activeUser','emailVerified'])->namespace('patient')->prefix('patient')->name('patient.')->group(function(){
    Route::get('/dashboard', 'PatientController@dashboard')->name('dashboard');
    Route::match(['get','post'],'/profile', 'PatientController@profile')->name('profile');
    Route::match(['get','post'],'/change-password', 'PatientController@changePassword')->name('change-password');
});
