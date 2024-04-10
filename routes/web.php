<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('top');
});

Route::get('/threads/{threadId}', function () {
	return view('thread');
});
