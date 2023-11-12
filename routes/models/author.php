<?php

/**
 * Generate resource routes for the given controller.
 */

use Illuminate\Support\Facades\Route;

Route::resource('authors', 'App\Http\Controllers\AuthorController');
