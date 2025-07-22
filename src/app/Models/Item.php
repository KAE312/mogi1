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
        return $this->belongsToMany(User::class, 'favorites')->withTimestamps();
    }

    public function isFavoritedBy($user)
    {
        return $this->favorites()->where('user_id', $user->id)->exists();
    }
    
    public function purchases()
    {
        return $this->hasMany(Purchase::class);
    }

    public function images()
    {
        return $this->hasMany(Image::class);
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

    public function favoritedByUsers()
    {
        return $this->belongsToMany(User::class, 'favorites')->withTimestamps();
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}

