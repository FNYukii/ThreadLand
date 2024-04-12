<?php

use App\Http\Controllers\TopController;
use Illuminate\Support\Facades\Route;


// Route::get('/', function () {
//     return view('top');
// });
Route::get('/', TopController::class);

Route::get('/threads/{threadId}', function () {
	return view('thread');
});
