<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WellSensor extends Model
{
    use HasFactory;

    protected $table = 'well_sensor';

    protected $fillable = [
        'well_id',
        'well_sensor_id',
    ];

    public function well()
    {
        return $this->belongsTo(Well::class, 'well_id');
    }
}
