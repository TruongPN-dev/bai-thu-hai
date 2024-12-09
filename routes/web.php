<?php

use App\Http\Controllers\admin\film_management_controller;
use App\Http\Controllers\loginController;
use Illuminate\Support\Facades\Route;

Route::get('/login', [loginController::class, 'showLogin']);
Route::post('/login', [loginController::class, 'login']);
Route::get('/logout', [loginController::class, 'logout'])->name('logout');

Route::prefix('admin')-> name('admin.')->group(function(){
    Route::prefix('movie')-> name('movie.')->group(function(){
        Route::get('index', [film_management_controller::class, 'index'])->name('index');
        Route::post('store', [film_management_controller::class, 'store'])->name('store');
        Route::post('update/{id}', [film_management_controller::class, 'update'])->name('update');
        Route::get('edit/{id}', [film_management_controller::class, 'edit'])->name('edit');
        Route::get('destroy/{id}', [film_management_controller::class, 'destroy'])->name('destroy');
    });
});