<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::apiResources([
    'user' => 'API\UserController',
    'register' => 'API\RegisterStudent'
]);

//API/UserController : Approval of Role.
Route::put('roleUpdate/{idnumber}', 'API\UserController@roleUpdate');
Route::post('/user/roleUpdateAll', 'API\UserController@roleUpdateAll');
Route::post('/user/newRegisteredUser', 'API\UserController@newRegisteredUser');
Route::post('/user/newRegisteredUserPagination', 'API\UserController@newRegisteredUserPagination');



Route::get('profile', 'API\UserController@profile');
Route::get('findUser', 'API\UserController@search');
Route::put('profile', 'API\UserController@updateProfile');

Route::put('addStudent', 'API\RegisterStudent@store');
Route::get('loadStudent', 'API\RegisterStudent@index');