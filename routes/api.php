<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::post('/login', 'auth\LoginController@login');
Route::post('/salon-register', 'auth\RegisterController@salonRegister');
Route::post('/user-register', 'auth\RegisterController@clientRegister');

Route::get('/service_lists', 'serviceList\ServiceListController@getServiceLists');


Route::get('/salons', 'salons\SalonsController@getAllSalonsWithFilter');
Route::get('/salon/info/{id}', 'salons\SalonsController@getSalonInfo');
Route::get('/salon/service/{id}', 'salons\SalonsController@getSalonService');
Route::get('/salon/team/{SalonId}/{serviceID}', 'salons\SalonsController@getSalonTeams');


Route::middleware('auth:api')->group(function () {
    Route::post('/logout', 'auth\LoginController@logout');
    Route::post('change-password', 'auth\LoginController@changePassword');


    Route::middleware('userApi')->group(function () {

        Route::get('profile/user-general-settings', 'profile\user\UserProfileController@getUserGeneralSettings');
        Route::post('profile/user-general-settings', 'profile\user\UserProfileController@setUserGeneralSettings');

        Route::get('profile/user-location', 'profile\user\UserProfileController@getUserLocation');
        Route::post('profile/user-location', 'profile\user\UserProfileController@setUserLocation');

        Route::get('/cart/{SalonID}/{ServiceID}/{TeamID}', 'cart\CartController@addToCart');
        Route::get('/cart', 'cart\CartController@index');
        Route::get('/cart/{id}', 'cart\CartController@destroy');
    });

    Route::middleware('salonApi')->group(function () {

        Route::get('profile/salon-general-settings', 'profile\salon\SalonProfileController@getSalonGeneralSettings');
        Route::post('profile/salon-general-settings', 'profile\salon\SalonProfileController@setSalonGeneralSettings');

        Route::get('profile/salon-bank-details', 'profile\salon\SalonProfileController@getSalonBankDetails');
        Route::post('profile/salon-bank-details', 'profile\salon\SalonProfileController@setSalonBankDetails');

        Route::get('profile/salon-location', 'profile\salon\SalonProfileController@getSalonLocation');
        Route::post('profile/salon-location', 'profile\salon\SalonProfileController@setSalonLocation');

        Route::get('profile/salon-images', 'profile\salon\SalonProfileController@getSalonImages');
        Route::post('profile/salon-images', 'profile\salon\SalonProfileController@setSalonImages');

        Route::get('profile/salon-appointments', 'profile\salon\SalonProfileController@getSalonAppointments');
        Route::post('profile/salon-appointments', 'profile\salon\SalonProfileController@setSalonAppointments');

        Route::get('profile/get-salon-service/{serviceID}', 'profile\salon\SalonProfileController@getSalonService');
        Route::get('profile/get-salon-services', 'profile\salon\SalonProfileController@getSalonServices');
        Route::post('profile/create-salon-service', 'profile\salon\SalonProfileController@createSalonService');
        Route::post('profile/edit-salon-service/{serviceID}', 'profile\salon\SalonProfileController@editSalonService');
        Route::post('profile/remove-salon-service', 'profile\salon\SalonProfileController@removeSalonService');


        Route::get('profile/get-salon-service-teams/{serviceID}', 'profile\salon\SalonProfileController@getSalonServiceTeams');
        Route::get('profile/get-salon-service-team/{teamID}', 'profile\salon\SalonProfileController@getSalonServiceTeam');
        Route::post('profile/create-salon-service-team', 'profile\salon\SalonProfileController@createSalonServiceTeam');
        Route::post('profile/edit-salon-service-team/{teamID}', 'profile\salon\SalonProfileController@editSalonServiceTeam');
        Route::post('profile/remove-salon-service-team', 'profile\salon\SalonProfileController@removeSalonServiceTeam');

    });
});


