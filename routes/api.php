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

Route::group(['middleware' => 'auth:api'], function () {

    Route::resource('lists', 'API\ListController')->except([
        'show','edit','create'
    ]);

    Route::post('lists/{id}/member', 'API\MemberController@store');
    Route::put('lists/{id}/member', 'API\MemberController@update');
    Route::delete('lists/{id}/member', 'API\MemberController@destroy');

});
