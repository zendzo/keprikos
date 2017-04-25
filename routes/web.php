<?php

// home Page
Route::get('/',[
	'as' => 'front.home',
	'uses' => 'Front\PagesController@getHome'
	]);

// kost
Route::get('/kost-list',[
	'as' => 'kost.list',
	'uses' => 'Kost\KostController@index'
	]);

Route::get('/kost-show/{id}',[
	'as' => 'kost.show',
	'uses' => 'Kost\KostController@show'
	]);

Route::get('/kost-search',[
	'as' => 'kost.search',
	'uses' => 'Kost\KostController@search'
	]);

Route::group(['prefix' => 'api/v1'],function()
{
	Route::get('/kost-search-autocomplete',['as' => 'kost.autocomplete','uses' => 'Kost\KostController@searchAutocomplete']);
});

Route::get('/kost-create',[
	'as' => 'kost.create',
	'uses' => 'Kost\KostController@create'
	]);

Route::post('/kost-store',[
	'as' => 'kost.store',
	'uses' => 'Kost\KostController@store'
	]);

// admin
Route::group(['namespace' => 'User', 'prefix' => 'user.dashboard', 'middleware' => 'auth'], function()
{
    Route::get('/', [
    	'as' => 'user.dashboard',
    	'uses' => 'PagesController@getDashboard'
    	]);

    Route::get('/blank', [
    	'as' => 'user.blank',
    	'uses' => 'PagesController@getBlank'
    	]);
});

// auth routes setup
Auth::routes();

// registration activation routes
Route::get('activation/key/{activation_key}', [
	'as' => 'activation_key',
	'uses' => 'Auth\ActivationKeyController@activateKey'
	]);
Route::get('activation/resend', [
	'as' =>  'activation_key_resend',
	'uses' => 'Auth\ActivationKeyController@showKeyResendForm'
	]);
Route::post('activation/resend',[
	'as' =>'activation_key_resend.post',
	'uses' => 'Auth\ActivationKeyController@resendKey'
	]);
//api easy autocomplete search
Route::get('api/users/{user}', function (App\Models\User $user) {
    return $user->email;
});

// favorite route
Route::post('favorite/{kost}','FavoritesKostController@favorite');

Route::post('unfavorite/{kost}','FavoritesKostController@unFavorite');

// order route
Route::get('/order-list',[
	'as'=>'order.list',
	'uses'=>'Kost\OrderController@index'
	]);

Route::post('/order-create',[
	'as'=>'kost.order',
	'uses'=>'Kost\OrderController@store'
	]);

// confirmation route
Route::get('/confirmation-order',[
	'as'=>'confirmation.list',
	'uses'=>'ConfirmationOderController@index'
	]);

Route::get('/confirmation-strore',[
	'as'=>'confirmation.store',
	'uses'=>'ConfirmationOderController@store'
	]);