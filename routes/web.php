<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('ClientSide.auth.Welcome');
})->name('view');

Route::get('/login', function () {
    return view('ClientSide.auth.Login');
})->name('loginPage');

Route::get('/register', function() {
    return view('ClientSide.auth.Register');
})->name('registerPage');

Route::get('/adminlogin', function() {
    return view('AdminSide.auth.Login');
})->name('adminLogin');