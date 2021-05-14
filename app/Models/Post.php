<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    //This following options protect you from MASS ASIGNMENT VULNERABILITIES
    // protected $guarded = ["id"]; //You can assign everything except the id
    protected $fillable = ["title", "excerpt", "body"];  //You can only assign this fields
}
