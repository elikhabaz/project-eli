<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Builder;

class Post extends Model
{
    use HasFactory;
    // protected $fillable = ['title'];
    protected $guarded = [];
    public static $post;

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function ($query , $search) {
            $query->where(fn($query)=>
                   $query->where('title', 'like', '%' . $search . '%')
                    ->orWhere('body', 'like', '%' . $search . '%')
             );
        });

        $query->when($filters['cat'] ?? false, function ($query , $category) {
            $query
                ->whereHas('category',fn($query)=>
                $query->where('slug' , $category)
                
               );
            
        });
        $query->when($filters['author'] ?? false, function ($query , $author) {
            $query
                    ->whereHas('author', fn($query)=>
                    $query->Where('username', $author)
               );
            
        });
    }
    public function getRouteKeyName()
    { //////I used it cause I want get post with id & slug
        return 'slug';
    }
    public function cat()
    {
        return $this->belongsTo(Cat::class);
    }
    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}