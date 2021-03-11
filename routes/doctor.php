<?php

Route::middleware(['isDoctor:siteDoctor','activeUser','emailVerified'])->namespace('doctor')->prefix('doctor')->name('doctor.')->group(function(){

    Route::get('/dashboard', 'DoctorController@dashboard')->name('dashboard');
    Route::match(['get','post'],'/profile', 'DoctorController@profile')->name('profile');
    Route::match(['get','post'],'/change-password', 'PatientController@changePassword')->name('change-password');
});
