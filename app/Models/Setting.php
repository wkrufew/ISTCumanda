<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    public $fillable = [
        'site_name',
        'site_title_portada',
        'site_subtitle_portada',
        'site_phone_1',
        'site_phone_2',
        'site_email',
        'site_address',
        'site_address2',
        'site_address3',
        'site_address4',
        'site_maps',
        'site_facebook',
        'site_instagram',
        'site_tiktok',
        'footer_text',
    ];
}
