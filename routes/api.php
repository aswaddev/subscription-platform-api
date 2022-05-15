<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\SubscriberController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::apiResource('websites.posts', PostController::class);
Route::apiResource('websites.subscribers', SubscriberController::class);
