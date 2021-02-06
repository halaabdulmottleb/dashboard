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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
// show all tasks 
Route::get('tasks/{from}/{to}', 'tasksController@tasks');
// to delete task 
Route::delete('task/{id}', 'tasksController@destroy');
// to update tasks in all tasks 
Route::put('task', 'tasksController@store');
//get all users
Route::get('users' , 'apiController@getUsers');
Route::get('user/tasks/{id}/{year}' , 'apiController@getUserInformation');
Route::get('user/taskPapers/{id}' , 'apiController@getUserInformation');

Route::get('branches' , 'apiController@branches');
Route::get('projects', 'apiController@projects');

Route::put('editUser' , 'apiController@editUser');
Route::get('statistics/tasks/{year}' , 'apiController@statisticsTasks');
Route::get('statistics/statisticsIndex' , 'structureController@statisticsIndex');
Route::get('project/family/members/{id}' , 'familyApiController@getMembers');
Route::post('project/family/members/add/{family}' , 'familyApiController@addMember');
