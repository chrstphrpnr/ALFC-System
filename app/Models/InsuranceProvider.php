<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InsuranceProvider extends Model
{
    use HasFactory;
    use HasFactory;
    public $table = 'insurance_providers';

    protected $fillable = [
        'provider_name',
        'provider_logo'
    ];

    public $timestamp = false;
    public $primaryKey = 'id';

}
