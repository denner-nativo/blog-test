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

Route::get('dashboard', function () {
    return view('pages.dashboard');
});

Route::get('blogs', function () {
    return view('pages.blogs.blogs');
});
Route::get('blogs/new', function () {
    return view('pages.blogs.newBlog');
});

Route::get('auth/login', function () {
    return view('auth.login');
});

Route::get('auth/sign-up', function () {
    return view('auth.signUp');
});