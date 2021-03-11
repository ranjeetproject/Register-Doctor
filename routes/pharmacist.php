<?php


// Route::group(['namespace' => 'pharmacist',"prefix"=>"pharmacist",'middleware' => ['isPharmacist:sitePharmacist']], function() {

Route::middleware(['isPharmacist:sitePharmacist','activeUser','emailVerified'])->namespace('pharmacist')->prefix('pharmacist')->name('pharmacist.')->group(function(){

    Route::get('/dashboard', 'PharmacistController@dashboard')->name('dashboard');
     Route::match(['get','post'],'/profile', 'PharmacistController@profile')->name('profile');
    Route::match(['get','post'],'/change-password', 'PharmacistController@changePassword')->name('change-password');
});

