<?php

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/statuses', function () {
//     return App\Models\Status::with('user')->latest()->get();
// });
Route::get('/statuses', 'App\Http\Controllers\StatusesController@index');
Route::post('/statuses', 'App\Http\Controllers\StatusesController@store');
