<?php

/**
 * Generate resource routes for the given controller.
 */

use App\Http\Controllers\GenreController;
use Illuminate\Support\Facades\Route;

Route::resource('genres', 'App\Http\Controllers\GenreController')->except(['show']);
Route::get('/genres/ajax', [GenreController::class, 'ajaxGenreName'])->name('genres.ajax');
