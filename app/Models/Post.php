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

    protected $with = ["category", "user"]; // This sends extra data to the response of the query to avoid multiple queries to the database. If you don't want this extra info just add for example Post::without('user')-> at the beginning of the query
    //This will create an Eloquent relationship to create $post->category
    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function scopeFilter($query, array $filters) {
        // if ($filters['search'] ?? false) {
        //     $query->where('title', 'like', '%' . request('search') . '%')->orWhere('body', 'like', '%' . request('search') . '%');
        // }
        $query->when($filters['search'] ?? false, function ($query, $search) {
            $query->where( function($query) use ($search) {
                $query->where('title', 'like', '%' . $search . '%')
                ->orWhere('body', 'like', '%' . $search . '%');
            });
        });
        $query->when($filters['category'] ?? false, function ($query, $category) {
            $query->whereHas('category', function ($query) use ($category) {
                    $query->where('slug', $category);
                });
        });
        $query->when($filters['user'] ?? false, function ($query, $user) {
            $query->whereHas('user', function ($query) use ($user) {
                    $query->where('username', $user);
                });
        });
    }
}
