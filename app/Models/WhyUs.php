<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class WhyUs extends Model
{
    use HasTranslations;

    protected $fillable = [
        'icon',
        'title',
        'content',
    ];

    public array $translatable = [
        'title',
        'content',
    ];
}
