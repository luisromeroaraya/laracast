<?php

namespace App\Models;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;

class Post {

    public static function all() {
        $files = File::files(resource_path("posts"));
        return array_map(function ($file) {
            return $file->getContents();
        }, $files);
    }

    public static function find($n) {
        $path = resource_path("posts/{$n}.html"); //helper to get the resources folder path
        if (!file_exists($path)) {
            throw new ModelNotFoundException();
        }
        return cache()->remember("posts.{$n}", 3600, fn() => file_get_contents($path)); //3600 is the amount of seconds that tha variable will be stored in the cache
    }
}

?>