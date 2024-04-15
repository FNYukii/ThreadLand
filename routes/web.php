<?php

use App\Http\Controllers\CreateThreadController;
use App\Http\Controllers\TopController;
use Illuminate\Support\Facades\Route;



Route::get('/', TopController::class);

Route::post('/create', CreateThreadController::class);

Route::get('/threads/{threadId}', function () {
	return view('thread');
});
