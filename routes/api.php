<?php

use App\Http\Controllers\ClientSide\ClientController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::post('/create', [ClientController::class , 'registerItems']);