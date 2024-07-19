<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [ArticleController::class, 'index'])->name('home');

Route::resource('articles', ArticleController::class);

Route::get('/articles', [ArticleController::class, 'index'])->name('articles.index');
// Route cho chi tiết bài viết
Route::get('articles/{id}', [ArticleController::class, 'show'])->name('articles.show');

// Route cho danh sách thể loại (nếu cần)
Route::get('categories/{id}', [ArticleController::class, 'index'])->name('categories.show');

// Route cho tất cả thể loại (để truyền dữ liệu vào layout)
Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');

// routes/web.php

Route::get('/search', [ArticleController::class, 'search'])->name('articles.search');

