<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\SubscriberController;
use App\Http\Controllers\WebsiteController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('/websites', [WebsiteController::class, 'index']);
Route::apiResource('websites.posts', PostController::class);
Route::apiResource('websites.subscribers', SubscriberController::class);
