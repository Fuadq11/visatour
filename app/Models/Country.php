<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class Country extends Model
{
    use HasTranslations, SoftDeletes;

    protected $fillable = [
        'code',
        'name',
        'flag'
    ];

    public array $translatable = [
        'name'
    ];

    public function visas(): BelongsToMany
    {
        return $this->belongsToMany(Visa::class);
    }

    public function visaOptions(): BelongsToMany
    {
        return $this->belongsToMany(VisaOption::class);
    }
}
