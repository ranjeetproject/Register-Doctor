<?php


// Route::group(['namespace' => 'pharmacist',"prefix"=>"pharmacist",'middleware' => ['isPharmacist:sitePharmacist']], function() {

Route::middleware(['isPharmacist:sitePharmacist','activeUser','emailVerified','adminVerified','acceptTermsAndConditions'])->namespace('pharmacist')->prefix('pharmacist')->name('pharmacist.')->group(function(){

    Route::get('/dashboard', 'PharmacistController@dashboard')->name('dashboard');
     Route::match(['get','post'],'/profile', 'PharmacistController@profile')->name('profile');
    Route::match(['get','post'],'/change-password', 'PharmacistController@changePassword')->name('change-password');
    Route::match(['get','post'],'/opening-hours', 'PharmacistController@openingHours')->name('opening-hours');

    Route::match(['get','post'],'/handy-document', 'PharmacistController@handyDocument')->name('handy-document');
    Route::get('view-handy-document/{id}', 'PharmacistController@viewHandyDocument')->name('view-handy-document');
});

