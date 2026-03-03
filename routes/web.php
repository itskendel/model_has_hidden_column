<?php

use App\Http\Controllers\AttachmentController;
use App\Http\Controllers\VisibleColumnController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('welcome');
})->name('home');

Route::get('/attachments', [AttachmentController::class, 'index']);

Route::get('/test', [VisibleColumnController::class, 'get_visible_column']);
