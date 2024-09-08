<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pollution extends Model
{
    protected $fillable = ['NH3','NO2', 'CO', 'PM2_5', 'Temp', 'Pressure', 'Humidity', 'O3', 'Date'];
    protected $table = 'environmental_data';
    use HasFactory;
}
