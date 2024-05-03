<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Spatie\Translatable\HasTranslations;

class VisaOption extends Model
{
    use HasFactory, HasTranslations;

    public $translatable = ['name', 'visa_period', 'stay_duration', 'additional_note', 'general_info'];

    protected $fillable = [
        'country_id',
        'visa_id',
        'visa_type_id',
        'name',
        'price',
        'visa_department_fee',
        'administration_fee',
        'courier_fee',
        'visa_period',
        'stay_duration',
        'additional_note',
        'general_info',
        'order_no',
    ];

    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class);
    }

    public function visa(): BelongsTo
    {
        return $this->belongsTo(Visa::class);
    }

    public function visaType(): BelongsTo
    {
        return $this->belongsTo(VisaType::class);
    }

    public function fee_types(): BelongsToMany
    {
        return $this->belongsToMany(FeeType::class, 'fee_type_visa_options', 'visa_option_id', 'fee_type_id');
    }

    public function visaOptionDetail(): HasOne
    {
        return $this->hasOne(VisaOptionDetail::class);
    }

    public function documents(): BelongsToMany
    {
        return $this->belongsToMany(VisaDocument::class, 'visa_option_documents', 'visa_option_id', 'visa_document_id');
    }
}
