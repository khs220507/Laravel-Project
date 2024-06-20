<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WeatherData extends Model
{
    use HasFactory;

    protected $fillable = [
        'base_date',
        'base_time',
        'nx',
        'ny',
        'T1H',
        'RN1',
        'REH',
        'WSD',
    ];

}
