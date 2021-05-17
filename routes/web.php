<?php

use App\Models\Post;
use App\Models\Category;
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
    $posts = Post::all(); //Gets all the posts
    return view('posts', ["posts" => $posts]); //Sends the $posts to the rendered page
});

Route::get('posts/{post:slug}', function (Post $post) { // Post::where('slug', $post)->firstOrFail()
    //$post = Post::findOrFail($id); //We created a Class named Post with the method find($n) in it (check folder app/models)
    return view('post', ['post' => $post]); //Sends the $post to rendered page
});//->where("n", "[A-z_\-]+"); //You can also use whereAlpha, whereAlphaNumeric, whereNumber

Route::get('categories/{category:slug}', function (Category $category) {
    return view('posts', ['posts' => $category->posts]);
});