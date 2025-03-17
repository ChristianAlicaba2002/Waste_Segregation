<?php

use App\Http\Controllers\ClientSide\ClientController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('AdminSide.auth.Welcome');
})->name('view');

Route::get('/login', function () {
    return view('AdminSide.auth.Login');
})->name('loginPage');

Route::get('/register', function() {
    return view('AdminSide.auth.Register');
})->name('registerPage');


Route::post('/RegisterClient', [ClientController::class, 'RegisterClient'])->name('registerClient');