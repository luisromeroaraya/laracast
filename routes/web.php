<?php

use App\Http\Controllers\PostController;
use App\Models\Post;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\File;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [PostController::class, "index"])->name('home');

Route::get('posts/{post:slug}', [PostController::class, "post"])->name('post');//->where("n", "[A-z_\-]+"); //You can also use whereAlpha, whereAlphaNumeric, whereNumber

// Route::get('categories/{category:slug}', [PostController::class, "category"])->name('category');

Route::get('users/{user:username}', [PostController::class, "user"])->name('user');