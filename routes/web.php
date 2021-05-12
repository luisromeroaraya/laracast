<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;

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
    $posts = Post::all();
    return view('posts', ["posts" => $posts]);
});

Route::get('posts/{n}', function ($n) { //Find a post by its name $n and pass it to a view called "post"
    $post = Post::find($n); //We created a Class named Post with the method find($n) in it (check folder app/models)
    return view('post', ['post' => $post]); //Sends variable $post to rendered page
})->where("n", "[A-z_\-]+"); //You can also use whereAlpha, whereAlphaNumeric, whereNumber
