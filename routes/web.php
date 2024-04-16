<?php

use App\Http\Controllers\CreateThreadController;
use App\Http\Controllers\ThreadPageController;
use App\Http\Controllers\TopPageController;
use Illuminate\Support\Facades\Route;



Route::get('/', TopPageController::class);
Route::post('/create', CreateThreadController::class);

Route::get('/threads/{threadId}', ThreadPageController::class);
