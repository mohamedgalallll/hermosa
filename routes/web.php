<?php

/*
|--------------------------------------------------------------------------
| Start Admin Login Routes
|--------------------------------------------------------------------------
*/

Route::get('/admin/login', 'Admin\auth\AuthController@login');

//Route::get('/admin/register', 'Admin\auth\AuthController@register');
//Route::get('/admin/forgot-password', 'Admin\auth\AuthController@forgotPassword');
/*
|--------------------------------------------------------------------------
| End Admin Login Routes
|--------------------------------------------------------------------------
*/



/*
|--------------------------------------------------------------------------
| Social Media Auth Routes
|--------------------------------------------------------------------------
*/
Route::get('/facebook-redirect', 'Site\auth\LoginController@FacebookRedirect');
Route::get('/facebook-call-back', 'Site\auth\LoginController@FacebookRedirectCallBack');
Route::get('/google-redirect', 'Site\auth\LoginController@GoogleRedirect');
Route::get('/google-call-back', 'Site\auth\LoginController@GoogleRedirectCallBack');

/*
|--------------------------------------------------------------------------
| Social Media Auth Routes
|--------------------------------------------------------------------------
*/



/*
|--------------------------------------------------------------------------
| Start Site Login Routes
|--------------------------------------------------------------------------
*/

Route::get('/login', 'Site\auth\LoginController@ShowLoginPage');
Route::post('/login', 'Auth\LoginController@login')->name('login');
Route::post('/logout', 'Auth\LoginController@logout')->name('logout');
Route::get('/register', 'Site\auth\RegisterController@ShowRegisterPage')->name('register');
Route::post('/salon-register', 'Site\auth\RegisterController@salonRegister');
Route::post('/client-register', 'Site\auth\RegisterController@clientRegister');
Route::get('/forgot-password', 'Admin\auth\AuthController@forgotPassword');
/*
|--------------------------------------------------------------------------
| End Site Login Routes
|--------------------------------------------------------------------------
*/

/*
|--------------------------------------------------------------------------
| start Site salon Routes
|--------------------------------------------------------------------------
*/
Route::get('/', 'site\home\HomeController@index');
Route::get('/salons', 'site\searchSalon\SearchController@salons');
Route::get('/salon-details/{id}', 'Site\salonDetails\salonDetailsController@index');
Route::post('/salon-details/{id}/rate', 'Site\salonDetails\salonDetailsController@AddRateSalon');
Route::post('/salon-details/serviceDetails/{id}', 'Site\salonDetails\salonDetailsController@ServiceDetails');


/*
|--------------------------------------------------------------------------
| end Site salon Routes
|--------------------------------------------------------------------------
*/


Route::post('/subscribeEmail', 'Site\subscribeEmails\SubscribeEmailsController@subscribeEmail');

// pages
Route::get('/about-us','Site\pages\aboutUs\aboutUsController@index');
Route::get('/contact-us','Site\pages\contactUs\contactUsController@index');
Route::get('/customer-services-center','Site\pages\customerServiceCenter\customerServiceCenterController@index');
Route::get('/customers-services','Site\pages\customersService\customersServiceController@index');
Route::get('/help-center','Site\pages\helpCenter\helpCenterController@index');
Route::get('/helping-partners','Site\pages\helpingPartners\helpingPartnersController@index');
Route::get('/protection','Site\pages\protection\protectionController@index');
Route::get('/services-items','Site\pages\serviceItems\serviceItemsController@index');
Route::get('/show-salon','Site\pages\showSalon\showSalonController@index');








Route::get('/clear', function () {
    Artisan::call('view:clear');
    Artisan::call('cache:clear');
    Artisan::call('config:cache');
    Artisan::call('route:cache');
    dd('Done');
});

Route::get('/createStorage', function () {
    Artisan::call('storage:link');
});

Route::get('/home', 'ChatsController@index')->name('home');


