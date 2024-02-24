<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Info extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "logo",
        "icon",
        "phone",
        "whatsapp",
        "email"
    ];

    protected $appends = ["logo_url", "icon_url"];

    public function getLogoUrlAttribute()
    {
        if ($this->logo == null) return asset("storage/app/public/img/logo.png");
        return asset("storage/app/public/img_info/" . $this->logo);
    }

    public function getIconUrlAttribute()
    {
        if ($this->icon == null) return asset("storage/app/public/img/icon.png");
        return asset("storage/app/public/img_info/" . $this->icon);
    }
}
