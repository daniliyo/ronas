<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    protected $fillable = [
        'city',
        'country',
        'lon',
        'lat',
    ];

    public function weather(){
        return $this->hasOne(Weather::class);
    }
}
