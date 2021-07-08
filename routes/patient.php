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

     Route::match(['get','post'],'/search-doctors', 'PatientController@searchDoctors')->name('search-doctors');

    Route::match(['get','post'],'/add-to-favorite', 'PatientController@addToFavorite')->name('add-to-favorite');

    Route::match(['get','post'],'/requested-consults', 'PatientController@requestedConsults')->name('requested-consults');

    Route::match(['get','post'],'/accepted-consults/{id}', 'PatientController@acceptedConsults')->name('accepted-consults');

    Route::match(['get','post'],'/prescriptions', 'PatientController@prescriptions')->name('prescriptions');

    Route::match(['get','post'],'/closed-cases', 'PatientController@closedCases')->name('closed-cases');
    Route::match(['get','post'],'/prescriptions-issued', 'PatientController@prescriptionsIssued')->name('prescriptions-issued');

    Route::match(['get','post'],'/pharmacies', 'PatientController@pharmacies')->name('pharmacies');

    Route::match(['get','post'],'/search-pharmacies', 'PatientController@searchPharmacies')->name('search-pharmacies');

    Route::get('/view-doctor-profile/{id}', 'PatientController@viewDoctorProfile')->name('view-doctor-profile');
    Route::get('/book-prescriptions/{id}', 'PatientController@bookPrescriptions')->name('book-prescriptions');
    Route::get('/view-childs', 'PatientController@viewChilds')->name('view-childs');
    Route::match(['get','post'],'/add-child', 'PatientController@addChild')->name('add-child');
    Route::match(['get','post'],'/change-account', 'PatientController@changeAccount')->name('change-account');
    Route::match(['get','post'],'/chats/{id}', 'PatientController@chats')->name('chats');
    Route::match(['get','post'],'/doctor-available-day', 'PatientController@doctorAvailableDay')->name('doctor-available-day');
    Route::match(['get','post'],'/symptoms-checker/{case_id}', 'PatientController@symptomsChecker')->name('symptoms-checker');
    Route::get('/show-prescriptions-rules', 'PatientController@showPrescriptionsRules')->name('show-prescriptions-rules');

    Route::match(['get','post'],'view-case/{id}', 'PatientController@viewCase')->name('view-case');
    Route::post('doctor-review', 'PatientController@doctorReview')->name('doctor-review');
    Route::post('accept-doctor', 'PatientController@accepteDoctor')->name('accept-doctor');

    Route::get('video-cal/{id}','PatientController@videoCall')->name('video-call');

});


    Route::middleware(['isPatient:sitePatient','activeUser','emailVerified'])->prefix('patient')->name('patient.')->group(function(){

        Route::get('payment/{case_id}','CheckoutController@checkout')->name('payment');
        Route::post('payment','CheckoutController@afterpayment')->name('payment.credit-card');
});
