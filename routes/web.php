<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
Auth::routes();
Route::middleware('auth')->group(function(){
    Route::view('/bmi/{any}', 'welcome')->where('any','.*');
});

Route::view('/re-login', 'auth.login');
Route::get('/logout-user', '\App\Http\Controllers\LogoutUserController@logout');


// Route::view('/tabel', 'master');

