<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class form extends Model
{
    use HasFactory;

    // protected $fillable = ['name', 'title', 'excerpt', 'deskripsi'];

    protected $guarted = ['id'];
    protected $with = ['category', 'author'];

    public function scopeFilter($query, array $filters)
    {

        
        $query->when($filters['search'] ?? false, function($query, $search) {

            return $query->where('title', 'like', '%' . $search . '%')
                        ->orwhere('deskripsi', 'like', '%' . $search . '%');

        });

        $query->when($filters['category'] ?? false, function($query, $category) {

            $query->whereHas('category', function($query) use ($category) {

                $query->where('slug', $category);
            });

        });


        $query->when($filters['author'] ?? false, function($query, $author) {

            $query->whereHas('author', function($query) use ($author) {

                $query->where('username', $author);
            });

        });  


    }


    public function category()
    {
        return $this->belongsTo(category::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function getRouteKeyName()
    {
    return 'slug';
    }
}