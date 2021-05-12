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
        $files = File::files(resource_path("posts")); // We get an array with all the files from the folder "posts"
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
        return collect($files)->map(function($file) {
            $document = YamlFrontMatter::parseFile($file);
            return new Post($document->title, $document->excerpt, $document->date, $document->body(), $document->html);    
        });
    }

    public static function find($html) {
        $posts = static::all();
        return $posts->firstWhere("html", $html);
    }
}

?>