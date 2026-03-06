<?php

use App\Http\Controllers\NatuxMailController;
use App\Mail\NatuxComingMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/natux', [NatuxMailController::class, 'index']);
Route::post('/natux', [NatuxMailController::class, 'store']);