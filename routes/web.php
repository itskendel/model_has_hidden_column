<?php

use App\Http\Controllers\AttachmentController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('welcome');
})->name('home');

Route::get('/attachments', [AttachmentController::class, 'index']);
