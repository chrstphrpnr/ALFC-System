<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommisionRevenue extends Model
{
    use HasFactory;
    public $table = 'commision_revenues';

    protected $fillable = [
        'quotation_number',
        'titles',
        'deduction_name',
        'deduction_amount',
    ];

    public $timestamp = false;
    public $primaryKey = 'id';
}
