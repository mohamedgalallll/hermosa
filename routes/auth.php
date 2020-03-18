<?php

Route::resource('/services','Site\services\ServicesController');
Route::resource('/teams','Site\teams\TeamsController');

Route::get('/profile', 'Site\profile\ProfileController@index');
Route::post('/profile/update-profile', 'Site\profile\ProfileController@UpdateProfile');
Route::post('/profile/update-password', 'Site\profile\ProfileController@UpdatePassword');
Route::post('/profile/update-bank', 'Site\profile\ProfileController@UpdateSalonBankDetails');
Route::post('/profile/update-location', 'Site\profile\ProfileController@UpdateSalonLocation');
Route::post('/profile/update-location-user', 'Site\profile\ProfileController@UpdateUserLocation');

Route::post('/profile/gallery/add', 'Site\profile\ProfileController@StoreSalonImage');
Route::post('/profile/gallery/delete', 'Site\profile\ProfileController@Delete0SalonImage');
Route::post('/profile/serviceDetails', 'Site\profile\ProfileController@ServiceDetails');
Route::post('/profile/update-appointments', 'Site\profile\ProfileController@UpdateSallonAppointments');
Route::delete('/profile/services/delete', 'Site\profile\ProfileController@DeleteService');
Route::delete('/profile/teams/delete', 'Site\profile\ProfileController@DeleteTeamMember');
Route::get('/profile/teams/add/{service_id}/{serviceList_id}', 'Site\profile\ProfileController@AddTeamMember');
Route::post('/profile/teams/add/{service_id}/{serviceList_id}', 'Site\profile\ProfileController@StoreMember');
Route::get('/profile/teams/{id}/{service_id}/{serviceList_id}/edit', 'Site\profile\ProfileController@editMember');
Route::PATCH('/profile/teams/{id}/{service_id}/{serviceList_id}', 'Site\profile\ProfileController@updateMember');
// Days
Route::post('/profile/reservation/change-status', 'Site\profile\ProfileController@ChangeReservationStatus');

Route::PATCH('/profile/days/{id}', 'Site\profile\ProfileController@updateDays');
Route::get('/getService', 'Site\services\ServicesController@getService');


Route::get('/cart/{SalonID}/{ServiceID}/{TeamID}', 'Site\cart\CartController@addToCart');
Route::get('/cart', 'Site\cart\CartController@index');
Route::get('/cart/{id}', 'Site\cart\CartController@destroy');


Route::post('/reservations/store', 'Site\reservation\ReservationsController@store');
Route::get('/reservations/pay/call_back', 'Site\reservation\ReservationsController@payCallBack');


Route::get('/chat', 'Site\chats\ChatsController@index');
Route::get('/getOldChats/{id}', 'Site\chats\ChatsController@getOldChats');
Route::get('messages', 'Site\chats\ChatsController@fetchMessages');
Route::post('messages', 'Site\chats\ChatsController@sendMessage');
Route::get('messageReceiverData', 'Site\chats\ChatsController@messageReceiverData');


Route::resource('/reservations', 'Site\reservations\ReservationsController');

