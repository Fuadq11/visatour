<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class Visa extends Model
{
    use Sluggable, HasTranslations, SoftDeletes;

    protected $fillable = ['name', 'slug', 'icon'];

    public array $translatable = ['name','slug'];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public function countries(): BelongsToMany
    {
        return $this->belongsToMany(Country::class, 'country_visa');
    }

    public function visaOptions(): HasMany
    {
        return $this->hasMany(VisaOption::class)->orderBy('order_no');
    }
}
