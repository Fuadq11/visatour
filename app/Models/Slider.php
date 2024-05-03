<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Slider extends Model
{
    use HasFactory, HasTranslations;

    public $translatable = ['title', 'sub_title'];

    protected $fillable = [
        'image',
        'title',
        'sub_title'
    ];
}
