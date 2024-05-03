<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Popup extends Model
{
    use HasFactory, HasTranslations;

    public $translatable = ['title', 'description', 'button_text'];

    protected $fillable = [
        'title',
        'description',
        'button_text',
        'button_link',
        'image',
    ];
}
