<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
    use HasFactory;

    public static $_STATES = [
        "Activo",
        "Inactivo"
    ];

    protected $fillable = [
        'name',
        'description',
        'short_description',
        'logo',
        'phone',
        'address',
        'location',
        'link',
        'state',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function categories()
    {
        return $this->hasMany(Category::class);
    }
}
