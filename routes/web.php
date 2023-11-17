<?php

use App\Http\Controllers\Admin\CommentController as AdminCommentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Api\CommentController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Middleware\AdminRole;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('/about', [HomeController::class, 'about'])->name('home.about');
Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/{blogPost:slug}', [BlogController::class, 'show'])->where(['blogPost' => '[a-z0-9\-]+'])->name('blog.show');
Route::get('/category/{category:slug}', [BlogController::class, 'category'])->where(['category' => '[a-z0-9\-]+'])->name('blog.category');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/api/user', function (Request $request) {
    return $request->user();
});

Route::prefix('/api/blog')->group(function() {
    Route::get('/{blogPost}/comments', [CommentController::class, 'index'])->name('comments.list');
    Route::post('/{blogPost}/comments', [CommentController::class, 'store'])->name('comments.store');
    Route::put('/comments/{comment}', [CommentController::class, 'update'])->name('comments.update');
    Route::delete('/comments/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');
});

Route::prefix('/admin')->name('admin.')->group(function() {
    Route::get('', [DashboardController::class, 'dashboard'])->name('dashboard');
    Route::get('/comments', [AdminCommentController::class, 'index'])->name('comment.index');
    Route::get('/comments/{comment}', [AdminCommentController::class, 'edit'])->name('comment.edit');
    Route::put('/comments/{comment}', [AdminCommentController::class, 'update'])->name('comment.update');
    Route::get('/comments/{comment}/delete', [AdminCommentController::class, 'delete'])->name('comment.delete');
    Route::delete('/comments/{comment}', [AdminCommentController::class, 'destroy'])->name('comment.destroy');
})->middleware(AdminRole::class);

require __DIR__.'/auth.php';
