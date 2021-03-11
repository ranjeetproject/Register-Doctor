<?php


//  *************for admin *************//
// 	Route::get('admin', function () {
//     return redirect()->route('admin.login');
//     });

// Route::group(['namespace' => 'admin',"prefix"=>"admin"], function(){
// Route::any('/login', 'AdminController@adminLogin')->name('admin.login');
// });

Route::middleware(['isAdmin:siteAdmin',"can:isAdmin"])->namespace('admin')->prefix('admin')->name('admin.')->group(function(){
Route::get('dashboard', 'AdminController@index')->name('dashboard');
Route::get('profile', 'AdminController@profile')->name('profile');
Route::post('profile', 'AdminController@updateProfile')->name('updateProfile');
Route::match(['get','post'],'settings', 'AdminController@settings')->name('settings');
Route::get('logout', 'AdminController@logout')->name('logout');

Route::get('users/{type}', 'UserController@userList')->name('users');
Route::match(['get','post'],'user/add', 'UserController@addUser')->name('user.add');
Route::get('user/view/{id}', 'UserController@userView')->name('user.view');
Route::get('user/edit/{id}', 'UserController@userEdit')->name('user.edit');
Route::post('user/update', 'UserController@userUpdate')->name('user.update');
Route::get('user/block/{user}', 'UserController@blockUser')->name('user.block');
Route::get('user/active/{user}', 'UserController@activeUser')->name('user.active');
Route::match(['get','post'],'user/delete/{id?}', 'UserController@userDelete')->name('user.delete');


Route::match(['get','post'],'news/index', 'NewsController@index')->name('news');
Route::match(['get','post'],'news/create', 'NewsController@create')->name('news.create');
Route::match(['get','post'],'news/edit/{id}', 'NewsController@edit')->name('news.edit');
Route::match(['get','post'],'news/delete/{id?}', 'NewsController@delete')->name('news.delete');


Route::match(['get','post'],'cms/index', 'CmsController@index')->name('cms');
Route::match(['get','post'],'cms/create', 'CmsController@create')->name('cms.create');
Route::match(['get','post'],'cms/edit/{id}', 'CmsController@edit')->name('cms.edit');
Route::match(['get','post'],'cms/delete/{id?}', 'CmsController@delete')->name('cms.delete');



});
//  *************for admin *************//
