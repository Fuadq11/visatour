<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Advantage extends Model
{
    use HasTranslations;

    protected $fillable = [
        'icon',
        'content',
    ];

    public array $translatable = [
        'content',
    ];
}
