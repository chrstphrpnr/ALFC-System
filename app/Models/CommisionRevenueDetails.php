<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommisionRevenueDetails extends Model
{
    use HasFactory;
    public $table = 'commision_revenue_details';

    protected $fillable = [
        'quotation_number',
        'marketing_fund_amount',
        'total_expenses_amount',
        'commission_revenue_vat_amount',
        'sales_credit_amount',
        'sales_credit_percentage'
    ];

    public $timestamp = false;
    public $primaryKey = 'id';
}
