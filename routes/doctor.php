<?php

Route::middleware(['isDoctor:siteDoctor','activeUser','emailVerified','adminVerified','acceptTermsAndConditions'])->namespace('doctor')->prefix('doctor')->name('doctor.')->group(function(){

    Route::get('/dashboard', 'DoctorController@dashboard')->name('dashboard');
    Route::match(['get','post'],'/profile', 'DoctorController@profile')->name('profile');
    Route::match(['get','post'],'/change-password', 'DoctorController@changePassword')->name('change-password');
    Route::match(['get','post'],'/handy-document', 'DoctorController@handyDocument')->name('handy-document');
    Route::match(['get','post'],'/get-thumbs-up', 'DoctorController@getThumbsUp')->name('get-thumbs-up');
    Route::match(['get','post'],'/appointment', 'DoctorController@appointment')->name('appointment');
    Route::match(['get','post'],'/send-patient-message', 'DoctorController@sendPatientMessage')->name('send-patient-message');
    Route::match(['get','post'],'/create-prescription', 'DoctorController@createPrescription')->name('create-prescription');
    Route::match(['get','post'],'/prescription-issues', 'DoctorController@prescriptionIssues')->name('prescription-issues');
    Route::match(['get','post'],'/close-cases', 'DoctorController@closeCases')->name('close-cases');
});
