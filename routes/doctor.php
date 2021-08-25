<?php

Route::middleware(['isDoctor:siteDoctor','activeUser','emailVerified','adminVerified','acceptTermsAndConditions'])->namespace('doctor')->prefix('doctor')->name('doctor.')->group(function(){

    Route::get('/dashboard', 'DoctorController@dashboard')->name('dashboard');
    Route::match(['get','post'],'/profile', 'DoctorController@profile')->name('profile');
    Route::match(['get','post'],'/change-password', 'DoctorController@changePassword')->name('change-password');
    Route::match(['get','post'],'/handy-document', 'DoctorController@handyDocument')->name('handy-document');
    Route::get('view-handy-document/{id}', 'DoctorController@viewHandyDocument')->name('view-handy-document');
    Route::match(['get','post'],'/get-thumbs-up', 'DoctorController@getThumbsUp')->name('get-thumbs-up');
    Route::match(['get','post'],'/appointment', 'DoctorController@appointment')->name('appointment');
    Route::match(['get','post'],'/send-patient-message', 'DoctorController@sendPatientMessage')->name('send-patient-message');
    Route::match(['get','post'],'/create-prescription', 'DoctorController@createPrescription')->name('create-prescription');
    Route::match(['get','post'],'/ajaxCasedetails', 'DoctorController@ajaxCasedetails')->name('ajaxCasedetails');
    Route::match(['get','post'],'/ajaxAddpriscription', 'DoctorController@ajaxAddpriscription')->name('ajaxAddpriscription');
    Route::match(['get','post'],'/ajaxFinalpriscription', 'DoctorController@ajaxFinalpriscription')->name('ajaxFinalpriscription');

    Route::match(['get','post'],'/prescription-issues', 'DoctorController@prescriptionIssues')->name('prescription-issues');
    Route::match(['get','post'],'/close-cases', 'DoctorController@closeCases')->name('close-cases');
    Route::match(['get','post'],'/available-days', 'DoctorController@availableDays')->name('available-days');
    Route::get('delete-available-day/{id}', 'DoctorController@deleteAvailableDay')->name('delete-available-day');
    Route::match(['get','post'],'edit-available-day', 'DoctorController@editAvailableDay')->name('edit-available-day');
    Route::match(['get','post'],'add-weekly-day', 'DoctorController@addWeeklyDay')->name('add-weekly-day');
    Route::get('delete-weekly-day/{id}', 'DoctorController@deleteWeeklyDay')->name('delete-weekly-day');
    Route::match(['get','post'],'edit-weekly-day', 'DoctorController@editWeeklyDay')->name('edit-weekly-day');
    Route::match(['get','post'],'quick-questions', 'DoctorController@quickQuestions')->name('quick-questions');
    Route::match(['get','post'],'prescriptions', 'DoctorController@prescriptions')->name('prescriptions');
    Route::match(['get','post'],'live-chats', 'DoctorController@liveChats')->name('live-chats');
    Route::match(['get','post'],'view-case/{id}', 'DoctorController@viewCase')->name('view-case');
    Route::match(['get','post'],'chats/{id}', 'DoctorController@chats')->name('chats');
    Route::match(['get','post'],'doctor-reply-case', 'DoctorController@doctorReplyCase')->name('doctor-reply-case');
    Route::match(['get','post'],'doctor-accept-case/{id}', 'DoctorController@doctorAcceptCase')->name('doctor-accept-case');

    Route::match(['get','post'],'cases/{questions_type}/{status?}', 'DoctorController@cases')->name('cases');

    Route::match(['get','post'],'view-medical-recorde/{id}', 'DoctorController@viewMedicalRecorde')->name('view-medical-recorde');
    Route::match(['get','post'],'summary-diagnosis/{id}', 'DoctorController@summaryDiagnosis')->name('summary-diagnosis');

    Route::get('video-cal/{id}','DoctorController@videoCallDoc')->name('video-call');
    Route::get('/cancel-booking/{id}', 'DoctorController@cancelBooking')->name('cancel-booking');
    Route::get('/print-case-summery/{id}', 'DoctorController@printCaseSummery')->name('print-case-summery');


});
