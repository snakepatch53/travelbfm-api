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

    protected $appends = ["logo_url", "location_qr_url"];

    public function getLogoUrlAttribute()
    {

        if ($this->logo == null) return asset("storage/app/public/img/logo.png");
        return asset("storage/app/public/img_businesses/" . $this->logo);
    }

    public function getLocationQrUrlAttribute()
    {
        return url("api/v1/str-to-qr-img/" . $this->location);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function categories()
    {
        return $this->hasMany(Category::class);
    }
}
