<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Professional extends Model
{
    use HasFactory;

    protected $fillable = [
        'document',
        'appointment_value',
    ];

    protected $casts = [
        'days_open' => 'json',
        'opening_hours' => 'json',
    ];
    
    public $timestamps = false;
}
