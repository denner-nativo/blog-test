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
Route::group(['prefix' => 'v1',], function($router){

  /*
  |-------------------------------------------------------------------------------
  | Auth - NO TOKEN NEEDED
  |-------------------------------------------------------------------------------
  | URL:            /api/v1/auth
  | Controller:     api\v1\LoginController
  | Method:         POST DELETE
  | Description:    Users' CRUD
  */
  

  Route::group(['prefix' => 'auth'], function ($router) {
    Route::post('login', 'api\v1\LoginController@login');
    Route::delete('logout', 'api\v1\LoginController@logout');
    // Route::post('refresh', 'AuthController@refresh');
    // Route::post('me', 'AuthController@me');
  });
  
  Route::group(['middleware' => 'api'], function($router){
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

    /*
    |-------------------------------------------------------------------------------
    | Blog
    |-------------------------------------------------------------------------------
    | URL:            /api/v1/blogs ---- /api/v1/blog
    | Controller:     api\v1\BlogController
    | Method:         GET POST PUT DELETE
    | Description:    Blogs' CRUD
    */

    Route::post('/blog', 'api\v1\BlogController@store');
    Route::get('/blogs', 'api\v1\BlogController@index');
    Route::get('/blogs/{userid}', 'api\v1\BlogController@getAllByUser');
    Route::get('/blogs/counter/{userid}', 'api\v1\BlogController@getCountBlogsByUser');
    Route::get('/blog/{id}', 'api\v1\BlogController@show');
    Route::put('/blog/{id}', 'api\v1\BlogController@update');
    Route::delete('/blog/{id}', 'api\v1\BlogController@delete');
  });

  
});
