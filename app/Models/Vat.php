<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vat extends Model
{
    use HasFactory;
    public $table = 'vats';

    protected $fillable = [

        'vat_percentage',
        'excluded_percentage',

    ];

    public $timestamp = false;
    public $primaryKey = 'id';
}
