<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "description",
        "icon",
        "business_id",
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function business()
    {
        return $this->belongsTo(Business::class);
    }
}
