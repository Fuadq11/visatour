<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class About extends Model
{
    use HasTranslations;

    protected $fillable = [
        'image',
        'content',
        'banner_image',
        'partner_title',
        'partner_subtitle',
        'meta_title',
        'meta_description',
    ];

    public array $translatable = [
        'content',
        'partner_title',
        'partner_subtitle',
        'meta_title',
        'meta_description',
    ];
}
