<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    public static $_STATES = [
        "Activo",
        "Inactivo"
    ];

    public static $_ROLES = [
        "Administrador",
        "Vendedor",
        "Cliente"
    ];

    protected $fillable = [
        'name',
        "lastname",
        "photo",
        "phone",
        "address",
        "state",
        "role",
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $appends = ["photo_url"];

    public function getPhotoUrlAttribute()
    {

        if ($this->photo == null) return asset("storage/app/public/img/user.png");
        return asset("storage/app/public/img_users/" . $this->photo);
    }

    public function businesses()
    {
        return $this->hasMany(Business::class);
    }

    public function carts()
    {
        return $this->hasMany(Cart::class);
    }
}
