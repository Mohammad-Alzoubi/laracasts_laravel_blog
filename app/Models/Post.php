<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'slug', 'excerpt', 'body'];
    Protected $with     = ['category', 'author'];

    public function scopeFilter($query, array $filters) // how you can request =>   Post::newQuery()->filter()
    {
        $query->when($filters['search'] ?? false, function ($query, $search){
            $query
                ->where('title', 'like', '%'. $search .'%')
                ->OrWhere('body', 'like', '%'. $search .'%');
        });

        $query->when($filters['category'] ?? false, function ($query, $category){
            $query->whereHas('category', fn($query) =>
            $query->where('slug', $category)
            );

//                === OR ===
//            $query
//                ->whereExists(fn($query) =>
//                $query->from('categories')
//                      ->whereColumn('categories.id', 'posts.category_id')
//                      ->where('categories.slug', $category)
//                );
        });

        $query->when($filters['author'] ?? false, function ($query, $author){
            $query->whereHas('author', fn($query) =>
            $query->where('username', $author)
            );
        });


//     ==== OR ====
//        if ($filters['search'] ?? false)
//        {
//            $query
//                    ->where('title', 'like', '%'. request('search') .'%')
//                    ->OrWhere('body', 'like', '%'. request('search') .'%');
//        }
    }

    public function category()
    {
//        choose one of this => hasOne, hasMany, belongsTo, belongsToMany
        return $this->belongsTo(Category::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

//    When you use slug
//    public function getRouteKeyName()
//    {
//        return 'slug';
//    }

}
