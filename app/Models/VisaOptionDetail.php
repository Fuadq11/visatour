<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\Translatable\HasTranslations;

class VisaOptionDetail extends Model
{
    use HasFactory, HasTranslations;

    public array $translatable = ['details'];

    protected $fillable = ['visa_option_id', 'details'];

    public function visaOption(): BelongsTo
    {
        return $this->belongsTo(VisaOption::class);
    }
}
