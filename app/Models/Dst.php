<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dst extends Model
{
    use HasFactory;
    public $table = 'dsts';

    protected $fillable = [

        'dst_percentage',

    ];

    public $timestamp = false;
    public $primaryKey = 'id';
}
