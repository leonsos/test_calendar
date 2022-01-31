<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('event.index');
})->middleware('auth');

Auth::routes();
Route::group(['middleware'=>['auth']],function(){
    Route::get('/event', [App\Http\Controllers\EventController::class, 'index']);
    Route::post('/event/show', [App\Http\Controllers\EventController::class, 'show']);
    Route::post('/event/showx', [App\Http\Controllers\EventController::class, 'showx']);
    Route::post('/event/shown', [App\Http\Controllers\EventController::class, 'shown']);
    Route::post('/event/add', [App\Http\Controllers\EventController::class, 'store']);
    Route::post('/event/edit/{id}', [App\Http\Controllers\EventController::class, 'edit']);
    Route::post('/event/update/{event}', [App\Http\Controllers\EventController::class, 'update']);
    Route::post('/event/delete/{id}', [App\Http\Controllers\EventController::class, 'destroy']);
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});
