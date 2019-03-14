<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/


Route::resource('items', 'ItemController');
Route::get('items/{item}/relations', 'ItemController@relations')->name('items.relations');
Route::get('relations/{relation}/delete', 'ItemController@destroyRelation')->name('items.destroyRelation');


Route::resource('users', 'UserController');
//Route::resource('devices', 'DeviceController');
//Route::resource('servers', 'ServerController');
//Route::resource('endpoints', 'EndpointController');


Route::get('frontend/index', 'FrontendController@index')->name('gui.index');