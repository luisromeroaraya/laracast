<?php

namespace App\Models;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;

class Post {
    public $title;
    public $excerpt;
    public $date;
    public $body;
    public $html;

    public function __construct($title, $excerpt, $date, $body, $html) {
        $this->title = $title;
        $this->excerpt = $excerpt;
        $this->date = $date;
        $this->body = $body;
        $this->html = $html;
    }

    public static function all() {
        // We need to loop into this array to create a new array with our Post objects:
        // $posts = [];
        // foreach ($files as $file) {
        //     $document = YamlFrontMatter::parseFile($file);
        //     $posts[] = new Post($document->title, $document->excerpt, $document->date, $document->body(), $document->html);
        // }
        // return $posts;
        //
        // We can replace the use of foreach with an array_map like this: 
        // $posts = array_map(function($file) {
        //     $document = YamlFrontMatter::parseFile($file);
        //     return new Post($document->title, $document->excerpt, $document->date, $document->body(), $document->html);
        // }, $files);
        // return $posts;
        //
        // But in Laravel we can also use Collections:

        return cache()->rememberForever("posts.all", function() { // We save the collection in the cache
            $files = File::files(resource_path("posts")); // We get an array with all the files from the folder "posts"
            return collect($files)->map(function($file) {
                $document = YamlFrontMatter::parseFile($file);
                return new Post($document->title, $document->excerpt, $document->date, $document->body(), $document->html);
            })->sortByDesc("date");
        });
    }

    public static function find($html) {
        $post = static::all()->firstWhere("html", $html);
        return $post;
    }

    public static function findOrFail($html) {
        $post = static::find($html);
        if (!$post) {
            throw new ModelNotFoundException();
        }
        return $post;
    }
}

?>