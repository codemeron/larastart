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
Route::post('/user/loadNewlyRegisteredUsers', 'API\UserController@loadNewlyRegisteredUsers');
Route::put('roleUpdate/{idnumber}', 'API\UserController@roleUpdate');
Route::post('/user/roleUpdateAll', 'API\UserController@roleUpdateAll');
Route::post('/user/newRegisteredUser', 'API\UserController@newRegisteredUser');
Route::post('/user/newRegisteredUserPagination', 'API\UserController@newRegisteredUserPagination');
Route::post('/user/loadNewRegisteredUser', 'API\UserController@loadNewRegisteredUser');



//API/FacultyController : Faculty Viewing of Records.
Route::post('/faculty/loadFacultyEmployee', 'API\FacultyController@loadFacultyEmployee');
Route::post('/faculty/facultyEmployeePagination', 'API\FacultyController@facultyEmployeePagination');
Route::post('/faculty/saveFacultyEmployee', 'API\FacultyController@saveFacultyEmployee');
Route::put('/faculty/updateFacultyEmployee/{id}', 'API\FacultyController@updateFacultyEmployee');
Route::delete('/faculty/deleteFacultyEmployee/{idnumber}', 'API\FacultyController@deleteFacultyEmployee');



Route::get('profile', 'API\UserController@profile');
Route::get('findUser', 'API\UserController@search');
Route::put('profile', 'API\UserController@updateProfile');



Route::put('addStudent', 'API\RegisterStudent@store');
Route::get('loadStudent', 'API\RegisterStudent@index');