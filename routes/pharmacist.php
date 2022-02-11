<?php


// Route::group(['namespace' => 'pharmacist',"prefix"=>"pharmacist",'middleware' => ['isPharmacist:sitePharmacist']], function() {

Route::middleware(['isPharmacist:sitePharmacist','activeUser','emailVerified','adminVerified','acceptTermsAndConditions'])->namespace('pharmacist')->prefix('pharmacist')->name('pharmacist.')->group(function(){

    Route::get('/dashboard', 'PharmacistController@dashboard')->name('dashboard');
     Route::match(['get','post'],'/profile', 'PharmacistController@profile')->name('profile');
    Route::match(['get','post'],'/change-password', 'PharmacistController@changePassword')->name('change-password');
    Route::match(['get','post'],'/opening-hours', 'PharmacistController@openingHours')->name('opening-hours');

    Route::match(['get','post'],'/accepted-priscription', 'PharmacistController@acceptedPriscription')->name('accepted-priscription');
    Route::match(['get','post'],'/ajaxAcceptPriscriptionDetails', 'PharmacistController@ajaxAcceptPriscriptionDetails')->name('ajaxAcceptPriscriptionDetails');
    Route::match(['get','post'],'/ajaxAcceptPriscriptionDetailsSendStatus', 'PharmacistController@acceptedPriscriptionSubmit')->name('ajaxAcceptPriscriptionDetailsSendStatus');
    Route::match(['get','post'],'/dispensed-prescriptions', 'PharmacistController@dispensedPrescriptions')->name('dispensed-prescriptions');
    Route::match(['get','post'],'/ajaxDispensedPrescriptions', 'PharmacistController@ajaxDispensedPrescriptions')->name('ajaxDispensedPrescriptions');
    Route::match(['get','post'],'/handy-document', 'PharmacistController@handyDocument')->name('handy-document');
    Route::get('view-handy-document/{id}', 'PharmacistController@viewHandyDocument')->name('view-handy-document');
    Route::get('chat', 'PharmacistController@chat')->name('chat');
    Route::post('chat', 'PharmacistController@chat_post')->name('chat_post');
    Route::match(['get','post'],'chats/{id}', 'PharmacistController@chats')->name('chats');
});