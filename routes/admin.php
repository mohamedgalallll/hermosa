<?php
/*
|--------------------------------------------------------------------------
| Auth  Routes
|--------------------------------------------------------------------------
*/
Route::get('/user/edit','auth\AuthController@edit');
Route::post('/user/edit','auth\AuthController@update');
/*
|--------------------------------------------------------------------------
| Theme Cookie Routes
|--------------------------------------------------------------------------
*/
Route::post('/theme_layout','cookie\ThemeCookieController@themeLayout');
Route::post('/theme_nav_bar_color','cookie\ThemeCookieController@navBarColor');
Route::post('/theme_footer_type','cookie\ThemeCookieController@footerType');
Route::post('/theme_nav_bar_type','cookie\ThemeCookieController@navBarType');
Route::post('/theme_sidebar_switch','cookie\ThemeCookieController@sidebarSwitch');
Route::post('/theme_scroll_top','cookie\ThemeCookieController@scrollTop');
Route::post('/theme_color','cookie\ThemeCookieController@themeColor');
/*
|--------------------------------------------------------------------------
| Resources Routes
|--------------------------------------------------------------------------
*/
Route::resource('settings','settings\SettingsController');
Route::resource('services-list','servicesLists\ServicesListsController');
Route::resource('clients','users\clients\ClientsController');
Route::resource('salons','users\salons\SalonsController');
Route::resource('admins','users\admins\AdminsController');
Route::resource('admin-groups','users\admins\AdminGroupsController');
Route::resource('main-categories','categories\MainCategoriesController');
Route::resource('sub-categories','categories\SubCategoriesController');
Route::resource('sub-sub-categories','categories\SubSubCategoriesController');
//services
Route::resource('services','services\ServicesController');
// LinksInFooter
Route::get('about-us','pages\aboutUs\aboutUsController@index');
Route::PATCH('about-us','pages\aboutUs\aboutUsController@update');
Route::get('protection','pages\protection\protectionController@index');
Route::PATCH('protection','pages\protection\protectionController@update');
Route::get('help-center','pages\helpCenter\helpCenterController@index');
Route::PATCH('help-center','pages\helpCenter\helpCenterController@update');
Route::get('services-items','pages\serviceItems\serviceItemsController@index');
Route::PATCH('services-items','pages\serviceItems\serviceItemsController@update');
Route::get('customers-services','pages\customersService\customersServiceController@index');
Route::PATCH('customers-services','pages\customersService\customersServiceController@update');
Route::get('customer-services-center','pages\customerServiceCenter\customerServiceCenterController@index');
Route::PATCH('customer-services-center','pages\customerServiceCenter\customerServiceCenterController@update');
Route::get('contact-us','pages\contactUs\contactUsController@index');
Route::PATCH('contact-us','pages\contactUs\contactUsController@update');
Route::get('show-salon','pages\showSalon\showSalonController@index');
Route::PATCH('show-salon','pages\showSalon\showSalonController@update');
Route::get('helping-partners','pages\helpingPartners\helpingPartnersController@index');
Route::PATCH('helping-partners','pages\helpingPartners\helpingPartnersController@update');
Route::get('home-background','pages\homeBackground\homeBackgroundController@index');
Route::PATCH('home-background','pages\homeBackground\homeBackgroundController@update');

//teams
Route::resource('teams','teams\TeamsController');

//Reservations
Route::resource('reservations', 'Reservations\ReservationsController');
Route::post('reservations/status', 'Reservations\ReservationsController@ChangeRservationsStatus');


//salon reviews
Route::resource('salon-reviews','salonReviews\salonReviewsController');
//team reviews
Route::resource('team-reviews','teamReviews\teamReviewsController');
Route::get('/getTeam', 'teamReviews\teamReviewsController@getTeam');

//News letter
Route::resource('subscribeEmail','subscribeEmails\SubscribeEmailsController');
/*
|--------------------------------------------------------------------------
| views Routes
|--------------------------------------------------------------------------
*/
Route::get('/','IndexController@index');
Route::get('/icons-font-awesome','icons\IconController@iconsFontAwesome');
Route::get('/icons-feather','icons\IconController@iconsFeather');
Route::get('/inputs','IndexController@inputsExamples');
Route::get('/analytics','IndexController@analyticsExample');
/*
|--------------------------------------------------------------------------
| Ajax Routes
|--------------------------------------------------------------------------
*/
// Change Status
Route::post('/team-reviews/change-status','teamReviews\teamReviewsController@ChangeTeamStatus');
Route::post('/salon-reviews/change-status','salonReviews\salonReviewsController@ChangeSalonStatus');
Route::post('/teams/change-status','teams\TeamsController@ChangeTeamsStatus');
Route::post('/clients/change-status','users\clients\ClientsController@ChangeClientStatus');
Route::post('/services/change-status','services\ServicesController@ChangeServiceStatus');
Route::post('/salons/change-status','users\salons\SalonsController@ChangeSalonStatus');

Route::get('/getSubCategories','categories\SubCategoriesController@GetSubCategories');
Route::get('/getSubSubCategories','categories\SubSubCategoriesController@supSupCategoryID');




