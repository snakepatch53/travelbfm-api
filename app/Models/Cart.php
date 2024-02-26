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

    protected $appends = ['date_str', 'pdf_url', 'pdf_seller_url'];

    public function getDateStrAttribute()
    {
        // formatear como por ejemplo: Lunes 12 de Julio de 2021
        return $this->created_at->locale('es')->isoFormat('dddd, D [de] MMMM [de] YYYY');
    }

    public function getPdfUrlAttribute()
    {
        return url("/api/v1/carts/{$this->id}/pdf");
    }

    public function getPdfSellerUrlAttribute()
    {
        return url("/api/v1/carts/{$this->id}/seller_id/");
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function productCarts()
    {
        return $this->hasMany(ProductCart::class);
    }
}
