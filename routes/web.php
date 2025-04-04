<?php

use App\Http\Middleware\CheckClient;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientSide\ClientController;

Route::get('/', function () {
    return view('ClientSide.auth.Welcome');
})->name('view');

Route::get('/login', function () {
    if (Auth::guard('client')->check()) {
        return redirect()->route('main');
    }
    else{
        return view('ClientSide.auth.Login');
    }
})->name('loginPage');

Route::get('/register', function() {
    return view('ClientSide.auth.Register');
})->name('registerPage');

Route::middleware(['auth:client'])->group(function () {
   Route::get('/main',[ClientController::class, 'MainPage'])->name('main');
});


Route::post('/RegisterClient', [ClientController::class, 'RegisterClient'])->name('registerClient');
Route::post('/LoginClient', [ClientController::class , 'LoginClient'])->name('loginClient');
Route::post('/LogoutClient', [ClientController::class , 'LogoutClient'])->name('LogoutClient');
