<?php

/**
 * Generate resource routes for the given controller.
 */

use Illuminate\Support\Facades\Route;

Route::resource('genres', 'App\Http\Controllers\GenreController');
