<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WellSensorData extends Model
{
    use HasFactory;

    protected $table = 'well_sensor_data';

    protected $fillable = [
        'well_sensor_id',
        'data_date'
    ];

    public function wellSensor()
    {
        return $this->belongsTo(wellSensor::class, 'well_sensor_id');
    }
}
