<?php

use App\Test;
use App\Container;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;

Route::resource('/posts',HomeController::class)->middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
]);

Route::get('/',function()
{
    app()->bind('test',function($key,$value)
    {
        return new Test('Poe Kaung');
    });

    $test = resolve('test');
    dd($test);
});

Route::get('logout',[AuthController::class, 'logout']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->get('/dashboard',[HomeController::class, 'index']);
