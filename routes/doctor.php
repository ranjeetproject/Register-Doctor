<?php

Route::middleware(['isDoctor:siteDoctor','activeUser','emailVerified'])->namespace('doctor')->prefix('doctor')->name('doctor.')->group(function(){

    Route::get('/dashboard', 'DoctorController@dashboard')->name('dashboard');
    Route::match(['get','post'],'/profile', 'DoctorController@profile')->name('profile');
    Route::match(['get','post'],'/change-password', 'DoctorController@changePassword')->name('change-password');
    Route::match(['get','post'],'/handy_document', 'DoctorController@handyDocument')->name('handy-document');
    Route::match(['get','post'],'/get-thumbs-up', 'DoctorController@getThumbsUp')->name('change-password');
    Route::match(['get','post'],'/handy_document', 'DoctorController@handyDocument')->name('change-password');
    Route::match(['get','post'],'/handy_document', 'DoctorController@handyDocument')->name('change-password');
    Route::match(['get','post'],'/handy_document', 'DoctorController@handyDocument')->name('change-password');
    Route::match(['get','post'],'/handy_document', 'DoctorController@handyDocument')->name('change-password');
});
