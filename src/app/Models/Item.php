<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'description',
        'price',
        'image_path',
        'condition_name',
        'is_sold',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function favorites()
    {
        return $this->hasMany(Favorite::class);
    }

    public function purchases()
    {
        return $this->hasMany(Purchase::class);
    }

    public function images()
    {
        return $this->hasMany(Image::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function likedUsers()
    {
        return $this->belongsToMany(User::class, 'likes')->withTimestamps();
    }

    public function categories()
    {
    return $this->belongsToMany(Category::class);
    }

    public function condition()
    {
    return $this->belongsTo(Condition::class);
    }
}

