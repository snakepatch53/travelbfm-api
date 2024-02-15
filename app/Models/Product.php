<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'photo',
        'price',
        'category_id'
    ];

    protected $appends = ["photo_url"];

    public function getPhotoUrlAttribute()
    {

        if ($this->photo == null) return asset("storage/app/public/img/product.png");
        return asset("storage/app/public/img_products/" . $this->photo);
    }


    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function productCarts()
    {
        return $this->hasMany(ProductCart::class);
    }
}
