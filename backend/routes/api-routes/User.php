<?php

use Illuminate\Http\Request;


Route::middleware([
        'scheduling-cors', 
        // 'auth'
    ])
    ->get('users', [
        App\Http\Controllers\Api\User\UserController::class, 'index'
    ]
)->name('user.list');


Route::middleware([
    // 'scheduling-cors', 
    'auth:api'
])
->get('users/me', [
    App\Http\Controllers\Api\User\UserController::class, 'getSelf'
]
)->name('user.confirm');

Route::middleware([
    // 'scheduling-cors', 
    'auth:api'
])
->get('users/get/{user}', [
    App\Http\Controllers\Api\User\UserController::class, 'get'
]
)->name('user.getOne');


Route::middleware([
    'scheduling-cors', 
    // 'auth'
])
->post('users/add', [
    App\Http\Controllers\Api\User\UserController::class, 'create'
]
)->name('user.create');


Route::middleware([
    'scheduling-cors', 
    // 'auth'
])
->put('users/update/{user}', [
    App\Http\Controllers\Api\User\UserController::class, 'update'
]
)->name('user.update');
