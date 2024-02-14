<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    public static $_STATES = [
        "Pendiente",
        "Entregado",
    ];

    protected $fillable = [
        'state',
        'phone',
        'address',
        'location',
        'comment',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function productCarts()
    {
        return $this->hasMany(ProductCart::class);
    }
}
