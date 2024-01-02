<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InsuredQuotationDetails extends Model
{
    use HasFactory;
    protected $table = 'insured_quotation_details';

    protected $fillable = [

        'quotation_number',
        'insured_full_name',
        'insured_car_classification',
        'insured_unit_model',
        'insured_plate_no',
        'effectivity_type',
        'effectivity_date_start',
        'effectivity_date_end',

        'insured_net_premium',
        'insured_dst_amount',
        'insured_vat_amount',
        'insured_rap_amount',
        'insured_lgt_amount',
        'insured_gross_premium',

        'provider_net_premium',
        'provider_dst_amount',
        'provider_vat_amount',
        'provider_rap_amount',
        'provider_lgt_amount',
        'provider_gross_premium_due',

        'insured_discount_amount',
        'insured_total_net_amount',
        'commision_revenue_total_amount',

    ];

    public $timestamp = false;
    public $primaryKey = 'id';
}
