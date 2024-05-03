<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Offer extends Model
{
    use HasFactory, HasTranslations;

    public array $translatable = ['place', 'package', 'type'];

    protected $fillable = [
        'image',
        'url',
        'place',
        'direction',
        'transport',
        'nights',
        'package',
        'price',
        'type',
        'order_no',
    ];
}
