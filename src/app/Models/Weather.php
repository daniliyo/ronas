<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Weather extends Model
{
    use HasFactory;

    protected $fillable = [
        'location_id',
        'temp',
        'description',
        'wind_speed',
        'pressure',
        'humidity',
        'timestamp'
    ];

    public function location(){
        return $this->belongsTo(Location::class);
    }
}
