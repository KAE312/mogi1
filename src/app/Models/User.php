<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

//リレーション
    //出品した商品
    public function items()
    {
        return $this->hasMany(Item::class);
    }
    //購入した記録
    public function purchases()
    {
        return $this->hasMany(Purchase::class);
    }
    //住所
    public function address()
    {
        return $this->hasOne(Address::class);
    }
    //いいね
    public function favorites()
    {
        return $this->hasMany(Favorite::class);
        return $this->belongsToMany(Item::class, 'favorites')->withTimestamps();
    }
    //いいねリスト
    public function likedItems()
    {
        return $this->belongsToMany(Item::class, 'favorites')->withTimestamps();
    }

   // public function favoriteItems()
    //{
     //   return $this->belongsToMany(Item::class, 'favorites')->withTimestamps();

     
}

