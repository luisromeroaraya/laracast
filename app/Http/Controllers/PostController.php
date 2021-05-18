<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index() {
        $posts = Post::latest()->filter(request(['search'])); //Filters the posts with the function scopeFilter($query) in Post.php
        $categories = Category::all(); //Gets all the categories
        return view('posts', ["posts" => $posts->get(), "categories" => $categories]); //Sends the $posts to the rendered page
    }

    public function post(Post $post) {
        //$post = Post::findOrFail($id); //We created a Class named Post with the method find($n) in it (check folder app/models)
        return view('post', ['post' => $post]); //Sends the $post to rendered page
    }

    public function category(Category $category) {
        $categories = Category::all(); //Gets all the categories
        return view('posts', ['posts' => $category->posts, "categories" => $categories, "currentCategory" => $category]);
    }

    public function user(Category $category) {
        $categories = Category::all(); //Gets all the categories
        return view('posts', ['posts' => $user->posts, "categories" => $categories]);
    }
}
