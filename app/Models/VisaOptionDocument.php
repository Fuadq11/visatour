<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class VisaOptionDocument extends Model
{
    use HasFactory;

    protected $fillable = [
        'visa_option_id',
        'document_id',
    ];

    public function visaOption(): BelongsTo
    {
        return $this->belongsTo(VisaOption::class);
    }

    public function document(): BelongsTo
    {
        return $this->belongsTo(VisaDocument::class);
    }
}
