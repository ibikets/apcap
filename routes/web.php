<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'LandingController@index')->name('welcome');
//Route::get('/{link}', function ($link){
//    return  view('welcome', ['link'=> $link]);
//});

Route::get('/example', function (){ return view('example'); });

Auth::routes();



Route::group(['prefix'=>'admin', 'middleware'=>'auth'], function (){

    Route::get('/dashboard', 'HomeController@index')->name('dashboard');

    Route::get('/settings', 'SettingsController@index')->name('settings');

    Route::get('/settings/officials', 'SettingsController@officials')->name('settings.officials');

    Route::post('/settings/create/official', 'SettingsController@addOfficial')->name('settings.addOfficial');

    Route::get('/settings/delete/official/{official}', 'SettingsController@deleteOfficial')->name('settings.deleteOfficial');

    Route::post('/settings/create/minister', 'SettingsController@addMinister')->name('settings.addMinister');

    Route::get('/settings/delete/minister/{minister}', 'SettingsController@deleteMinister')->name('settings.deleteMinister');

    Route::post('/settings/create/designation', 'SettingsController@addDesignation')->name('settings.addDesignation');

    Route::get('/settings/delete/designation/{designation}', 'SettingsController@deleteDesignation')->name('settings.deleteDesignation');

    Route::post('/settings/create/district', 'SettingsController@addDistrict')->name('settings.addDistrict');

    Route::get('/settings/delete/district/{district}', 'SettingsController@deleteDistrict')->name('settings.deleteDistrict');

    Route::post('/settings/create/constituency', 'SettingsController@addConstituency')->name('settings.addConstituency');

    Route::get('/settings/delete/constituency/{constituency}', 'SettingsController@deleteConstituency')->name('settings.deleteConstituency');

    Route::post('/settings/create/party', 'SettingsController@addParty')->name('settings.addParty');

    Route::get('/settings/delete/party/{party}', 'SettingsController@deleteParty')->name('settings.deleteParty');

    Route::post('/settings/create/lga', 'SettingsController@addLga')->name('settings.addLga');

    Route::get('/settings/delete/lga/{lga}', 'SettingsController@deleteLga')->name('settings.deleteLga');

    Route::post('/settings/create/state', 'SettingsController@addState')->name('settings.addState');

    Route::get('/settings/delete/state/{state}', 'SettingsController@deleteState')->name('settings.deleteState');

    Route::post('/settings/create/ward', 'SettingsController@addWard')->name('settings.addWard');

    Route::get('/settings/delete/ward/{ward}', 'SettingsController@deleteWard')->name('settings.deleteWard');


});
