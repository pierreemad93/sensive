<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ThemeController;
use App\Http\Controllers\ProfileController;


Route::controller(ThemeController::class)->name('theme.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/category', 'categories')->name('category');
    Route::get('/contact-us', 'contactUs')->name('contact-us');
});
Route::get('blog/my-blogs', [BlogController::class, 'myBlogs'])->name('blog.my-blog');
Route::resource('blog', BlogController::class);

Route::post('comments', [CommentController::class, 'store'])->name('comments.store');


require __DIR__ . '/auth.php';
