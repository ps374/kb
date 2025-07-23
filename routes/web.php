<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::post('/attachments', [AttachmentController::class, 'store']);
Route::resource('tickets', TicketController::class)->middleware('auth');
Route::prefix('admin')->middleware('admin')->group(function() {
    Route::resource('tickets', Admin\TicketAdminController::class)->except(['create', 'store']);
});
