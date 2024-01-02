<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProviderProductExtension extends Model
{
    use HasFactory;
    public $table = 'provider_product_extensions';

    protected $fillable = [
        'extension_details',
        'provider_product_id',
    ];

    public $timestamp = false;
    public $primaryKey = 'id';
}
