<?php

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

Route::get('/', function () {
    $posts = Post::latest();
    if (request('search')) {
        $posts->where('title', 'like', '%' . request('search') . '%')->orWhere('body', 'like', '%' . request('search') . '%');
    }
    $categories = Category::all(); //Gets all the categories
    return view('posts', ["posts" => $posts->get(), "categories" => $categories]); //Sends the $posts to the rendered page
})->name('home');

Route::get('posts/{post:slug}', function (Post $post) { // Post::where('slug', $post)->firstOrFail()
    //$post = Post::findOrFail($id); //We created a Class named Post with the method find($n) in it (check folder app/models)
    return view('post', ['post' => $post]); //Sends the $post to rendered page
})->name('post');//->where("n", "[A-z_\-]+"); //You can also use whereAlpha, whereAlphaNumeric, whereNumber

Route::get('categories/{category:slug}', function (Category $category) {
    $categories = Category::all(); //Gets all the categories
    return view('posts', ['posts' => $category->posts, "categories" => $categories, "currentCategory" => $category]);
})->name('category');

Route::get('users/{user:username}', function (User $user) {
    $categories = Category::all(); //Gets all the categories
    return view('posts', ['posts' => $user->posts, "categories" => $categories]);
})->name('user');