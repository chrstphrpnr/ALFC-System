<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lgt extends Model
{
    use HasFactory;
    public $table = 'lgts';

    protected $fillable = [

        'lgt_percentage',
        'lgt_location',

    ];

    public $timestamp = false;
    public $primaryKey = 'id';
}
