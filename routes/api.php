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
Route::group([
    'middleware' => ['auth:api'],
    'namespace' => 'Api\V1',
], function () {
	Route::resource('user', 'UserController', ['except' => ['edit']]);
    Route::resource('role', 'RoleController', ['except' => ['edit']]);
    Route::post('role/{role_id}/attach_users', 'RoleController@attachUser');
    Route::get('permissions', 'RoleController@getAbilities');
});