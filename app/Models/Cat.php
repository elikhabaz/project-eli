<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cat extends Model
{
    use HasFactory;
    public function posts(){
        return $this->hasMany(Post::class);
    }
    protected $guarded = [];

    public function getRouteKeyName(){//////I used it cause I want get post with id & slug
        return 'slug';
    }
}
