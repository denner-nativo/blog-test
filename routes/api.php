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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

//'middleware' => 'auth:api'
Route::group(['prefix' => 'v1'], function(){
    
  
    /*
    |-------------------------------------------------------------------------------
    | Roles
    |-------------------------------------------------------------------------------
    | URL:            /api/v1/roles ---- /api/v1/role
    | Controller:     api\v1\RoleController
    | Method:         GET
    | Description:    Roles just have GET methods
    */
    Route::get('/roles', 'api\v1\RoleController@index');
    Route::get('/role/{id}', 'api\v1\RoleController@show');
    
    /*
    |-------------------------------------------------------------------------------
    | Users
    |-------------------------------------------------------------------------------
    | URL:            /api/v1/users ---- /api/v1/user
    | Controller:     api\v1\UserController
    | Method:         GET POST PUT DELETE
    | Description:    Users' CRUD
    */
    Route::post('/user', 'api\v1\UserController@store');
    Route::get('/users', 'api\v1\UserController@index');
    Route::get('/user/{id}', 'api\v1\UserController@show');
    Route::put('/user/{id}', 'api\v1\UserController@update');
    Route::delete('/user/{id}', 'api\v1\UserController@delete');

    
  });
