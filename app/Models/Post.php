<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory; // means that there is a Factory method to create users randomly

    //This following options protect you from MASS ASIGNMENT VULNERABILITIES
    // protected $guarded = ["id"]; //You can assign everything except the id
    protected $fillable = ["title", "excerpt", "body", "slug", "category_id"];  //You can only assign this fields

    //This will create an Eloquent relationship to create $post->category
    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
