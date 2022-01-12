<?php

Route::get('/', 'frontend\FrontendController@index')->name('home');
Route::get('/about-us', 'frontend\FrontendController@getaboutUs')->name('aboutUs');
Route::get('/news', 'frontend\FrontendController@getNews')->name('news');
Route::get('/news/{slug}', 'frontend\FrontendController@detailNews')->name('detail_news');
Route::get('/faq', 'frontend\FrontendController@getFaq')->name('userFaq');
Route::get('/contact-us', 'frontend\FrontendController@contactUs')->name('contactUs');
Route::post('/contact-us', 'frontend\FrontendController@contactUsPost');
Route::get('/terms-condition/{type?}', 'frontend\FrontendController@getTermsCondition')->name('termsCondition');
Route::get('/privacy-policy', 'frontend\FrontendController@getPrivacyPolicy')->name('privacyPolicy');
Route::get('/latest-on-coronavirus', 'frontend\FrontendController@getLatestOnCoronavirus')->name('latestOnCoronavirus');
Route::get('/latest-on-coronavirus/{slug}', 'frontend\FrontendController@detailCoronavirus')->name('latestOnCoronavirusDetails');
Route::get('/living-advice', 'frontend\FrontendController@getLivingAdvice')->name('livingAdvice');
Route::get('/living-advice/{slug}', 'frontend\FrontendController@detailLivingAdvice')->name('livingAdviceDetails');
Route::get('/nearest-doctor', 'frontend\FrontendController@nearestDoctor')->name('nearestDoctor');
Route::get('/top-doctor', 'frontend\FrontendController@topDoctor')->name('topDoctor');
Route::get('/child-pathway', 'frontend\FrontendController@childPathway')->name('child-pathway');
//Route::get('/home', 'frontend\FrontendController@index');
Route::any('search/{model}/{type?}', 'SearchController')->name('search');

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');


Route::get('test', function () {
    $childs = App\User::with('parents')
    // ->wherehas('profile',function ( $query) {
    //     $query->where(DB::raw('FLOOR(DATEDIFF(DATE_ADD(DATE(NOW()),INTERVAL 30 DAY),dob) / 365.25) - (FLOOR(DATEDIFF(DATE(NOW()),dob) / 365.25))'),1)
    //     ->where(DB::raw('FLOOR(DATEDIFF(DATE_ADD(DATE(NOW()),INTERVAL 30 DAY),dob) / 365.25)'),18);
    // })
    ->where('role',4)
    ->get();

    foreach($childs as $child) {
        // dd($child->parents);
        App\User::find($child->parents->user_id);

    }
});

// Route::namespace('user')->group(function(){
// 	Route::get('registration', 'UserController@registration')->name('registration');
//     Route::post('create-user', 'UserController@createUser')->name('create-user');

// });
// Route::get('login/facebook', 'Auth\LoginController@redirectToProvider');
// Route::get('login/facebook/callback', 'Auth\LoginController@handleProviderCallback');

Route::namespace('user')->group(function(){
	// Route::any('/login', 'UserController@login')->name('login');
	Route::get('registration', 'UserController@registration')->name('registration');
	Route::match(['get','post'],'registration-step2/{id}', 'UserController@registrationStep2')->name('registration-step2');
	Route::post('create-user', 'UserController@createUser')->name('create-user');
	Route::get('email-verification/{id}', 'UserController@emailVerification')->name('email-verification');
	Route::match(['get','post'], 'child-to-adult/{id}', 'UserController@childToAdult')->name('child-to-adult');
	Route::get('accept-term-and-conditions/{id}', 'UserController@acceptTermsAndConditions')->name('accept-term-and-conditions');
	Route::match(['get','post'],'profile/{id}', 'UserController@doctorProfile')->name('doc-verify-profile');
    // Route::match(['get','post'],'/profile', 'DoctorController@profile')->name('profile');

	// Route::	get('logout', 'UserController@logout')->name('logout');
});


      Route::get('/admin-post', 'user\UserController@post');


	Route::any('forgot-password', 'CommonController@forgotPassword')->name('forgot-password');
	Route::get('reset-password/{id}', 'CommonController@resetPassword')->name('reset-password');
	Route::post('change-password', 'CommonController@changePassword')->name('change-password');


// //  *************for admin *************//
	Route::get('admin', function () {
    return redirect()->route('admin.login');
    });

Route::prefix('admin')->name('admin.')->group(function(){
Route::any('/login', 'admin\AdminController@adminLogin')->name('login');
});

// Route::middleware(['isAdmin:siteAdmin',"can:isAdmin"])->namespace('admin')->prefix('admin')->name('admin.')->group(function(){
// Route::get('dashboard', 'AdminController@index')->name('dashboard');
// Route::get('profile', 'AdminController@profile')->name('profile');
// Route::post('profile', 'AdminController@updateProfile')->name('updateProfile');
// Route::match(['get','post'],'settings', 'AdminController@settings')->name('settings');
// Route::get('logout', 'AdminController@logout')->name('logout');

// Route::get('users/{type}', 'UserController@userList')->name('users');
// Route::match(['get','post'],'user/add', 'UserController@addUser')->name('user.add');
// Route::get('user/view/{id}', 'UserController@userView')->name('user.view');
// Route::get('user/edit/{id}', 'UserController@userEdit')->name('user.edit');
// Route::post('user/update', 'UserController@userUpdate')->name('user.update');
// Route::get('user/block/{user}', 'UserController@blockUser')->name('user.block');
// Route::get('user/active/{user}', 'UserController@activeUser')->name('user.active');
// Route::match(['get','post'],'user/delete/{id?}', 'UserController@userDelete')->name('user.delete');


// Route::match(['get','post'],'news/index', 'NewsController@index')->name('news');
// Route::match(['get','post'],'news/create', 'NewsController@create')->name('news.create');
// Route::match(['get','post'],'news/edit/{id}', 'NewsController@edit')->name('news.edit');
// Route::match(['get','post'],'news/delete/{id?}', 'NewsController@delete')->name('news.delete');


// Route::match(['get','post'],'cms/index', 'CmsController@index')->name('cms');
// Route::match(['get','post'],'cms/create', 'CmsController@create')->name('cms.create');
// Route::match(['get','post'],'cms/edit/{id}', 'CmsController@edit')->name('cms.edit');
// Route::match(['get','post'],'cms/delete/{id?}', 'CmsController@delete')->name('cms.delete');



// });
// //  *************for admin *************//


// Route::get('paywithpaypal', array('as' => 'paywithpaypal','uses' => 'PaypalController@payWithPaypal',));
// Route::post('paypal', array('as' => 'paypal','uses' => 'PaypalController@postPaymentWithpaypal',));
// Route::get('paypal', array('as' => 'status','uses' => 'PaypalController@getPaymentStatus',));

Route::get('payment/{case_id}','CheckoutController@checkout');
Route::post('payment','CheckoutController@afterpayment')->name('payment.credit-card');
Route::get('download-handydoc/{id}','common\CommHandyDocController@downloadHandyDoc')->name('download.handy_doc');
Route::post('save-timezone','common\CommHandyDocController@setTimeZone')->name('save_timezone');

