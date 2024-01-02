<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quotation extends Model
{
    use HasFactory;
    public $table = 'quotations';

    protected $fillable = [

        'quotation_number',
        'computation_rate_id',
        'insured_limit',
        'insured_rate',
        'insured_premium_due',
        'provider_premium_due',

    ];

    public $timestamp = false;
    public $primaryKey = 'id';
}
