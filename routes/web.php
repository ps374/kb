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
Route::prefix('admin')->middleware('admin')->group(function() {
    Route::resource('articles', Admin\ArticleAdminController::class);
    Route::resource('categories', Admin\CategoryAdminController::class)->except(['show', 'edit', 'update']);
});
Route::prefix('admin')->middleware('admin')->group(function() {
    // Publishing routes
    Route::post('articles/{id}/submit-review', [Admin\ArticlePublishController::class, 'submitForReview'])
         ->name('admin.articles.submit-review');
    Route::post('articles/{id}/publish', [Admin\ArticlePublishController::class, 'publish'])
         ->name('admin.articles.publish');
         
    // Category tree
    Route::get('categories/tree', function() {
        return view('admin.categories.tree', [
            'categories' => Category::with('children')->whereNull('parent_id')->get()
        ]);
    })->name('admin.categories.tree');
});
