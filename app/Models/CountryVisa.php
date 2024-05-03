<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CountryVisa extends Model
{
    use HasFactory;

    protected $fillable = [
        'country_id',
        'visa_id'
    ];

    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class);
    }

    public function visa(): BelongsTo
    {
        return $this->belongsTo(Visa::class);
    }
}
