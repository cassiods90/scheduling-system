<?php

use Illuminate\Http\Request;


Route::middleware([])
    ->post('login', [
        App\Http\Controllers\Api\AuthController::class, 'auth'
    ]
)->name('auth.login');

Route::middleware(['auth:api'])
    ->get('logout', [
        App\Http\Controllers\Api\AuthController::class, 'logout'
    ]
)->name('auth.logout');

