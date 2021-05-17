<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    //This will create an Eloquent relationship to create $post->category
    public function posts() {
        return $this->hasMany(Post::class);
    }
}
