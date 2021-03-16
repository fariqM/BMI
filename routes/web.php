<?php

use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function(){
    Route::view('/web/{any}', 'welcome')->where('any','.*');
});

// Route::view('login', 'auth.login')->name('login');



// Route::view('/tabel', 'master');

