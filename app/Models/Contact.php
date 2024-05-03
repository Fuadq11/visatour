<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Contact extends Model
{
    use HasFactory, HasTranslations;

    public $translatable = ['address', 'work_hours', 'about', 'meta_title', 'meta_description'];

    protected $fillable = [
        'main_email',
        'email',
        'phone1',
        'phone2',
        'phone3',
        'phone4',
        'address',
        'map',
        'work_hours',
        'about',
        'banner_image',
        'meta_title',
        'meta_description',
    ];
}
