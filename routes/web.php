<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

Route::get('/', function () {
    return redirect()->route('posts.index');
});

Route::prefix('posts')->controller(PostController::class)->group(function () {
    Route::get('/', 'index')->name('posts.index');
    Route::get('create', 'create')->name('posts.create');
    Route::post('store', 'store')->name('posts.store');
    Route::get('show/{post}', 'show')->name('posts.show');
    Route::delete('delete/{post}', 'destroy')->name('posts.destroy');
});
