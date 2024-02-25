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
        'user_id',

        // horarios | ini
        'monday_open',
        'monday_close',
        'tuesday_open',
        'tuesday_close',
        'wednesday_open',
        'wednesday_close',
        'thursday_open',
        'thursday_close',
        'friday_open',
        'friday_close',
        'saturday_open',
        'saturday_close',
        'sunday_open',
        'sunday_close',
        // horarios | fin
    ];

    protected $appends = ["logo_url", "location_qr_url"];

    public function getLogoUrlAttribute()
    {

        if ($this->logo == null) return asset("storage/app/public/img/business.png");
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
