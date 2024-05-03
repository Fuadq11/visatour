<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\Translatable\HasTranslations;

class VisaType extends Model
{
    use HasFactory, HasTranslations;

    public $translatable = ['name'];

    protected $fillable = ['name'];

    public function visaOptions(): HasMany
    {
        return $this->hasMany(VisaOption::class);
    }
}
