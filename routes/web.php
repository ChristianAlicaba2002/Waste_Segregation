<?php

use App\Http\Middleware\CheckClient;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientSide\ClientController;
use App\Http\Controllers\Guest\NonUserController;
use App\Http\Middleware\PreventBackHistory;

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
})->name('loginPage')->middleware(PreventBackHistory::class);

Route::get('/register', function() {
    return view('ClientSide.auth.Register');
})->name('registerPage');

Route::middleware(['auth:client'])->group(function () {
   Route::get('/main',[ClientController::class, 'MainPage'])->name('main')->middleware(PreventBackHistory::class);
});


// Client Controller
Route::post('/RegisterClient', [ClientController::class, 'RegisterClient'])->name('registerClient');
Route::post('/LoginClient', [ClientController::class , 'LoginClient'])->name('loginClient');
Route::post('/UpdateClient' , [ClientController::class , 'UpdateUserInformation'])->name('update.client');
Route::post('/LogoutClient', [ClientController::class , 'LogoutClient'])->name('LogoutClient');


// None User Controller
Route::post('/create', [NonUserController::class , 'NoneUser'])->name('sendfeedback');