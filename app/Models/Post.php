<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    // protected $fillable = ['title'];
    protected $guarded = [];
    public static $post;
    public function getRouteKeyName(){//////I used it cause I want get post with id & slug
        return 'slug';
    }
    public function cat(){
        return $this->belongsTo(Cat::class);
    }
    public function author(){
        return $this->belongsTo(User::class , 'user_id');
    }
}

