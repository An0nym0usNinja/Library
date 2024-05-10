<?php

/**
 * Generate resource routes for the given controller.
 */

use App\Http\Controllers\AuthorController;
use Illuminate\Support\Facades\Route;

Route::resource('authors', 'App\Http\Controllers\AuthorController')->except(['show']);
Route::get('/authors/ajax', [AuthorController::class, 'ajaxAuthorName'])->name('authors.ajax');
