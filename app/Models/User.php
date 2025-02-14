<?php

namespace App\Models;
use Laravel\Sanctum\HasApiTokens;
// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, HasApiTokens;

    protected $fillable = ['username', 'fullname', 'email', 'password', 'isAdmin'];

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function events()
    {
        return $this->hasMany(Event::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function cartItems()
    {
        return $this->hasMany(CartItem::class);
    }
}
