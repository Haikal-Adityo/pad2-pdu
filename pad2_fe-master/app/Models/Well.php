<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Well extends Model
{
    use HasFactory;

    protected $table = 'wells';

    protected $primaryKey = 'well_id';

    protected $fillable = [
        'company_id',
        'well_name',
        'well_location',
    ];

    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id', 'company_id');
    }
}
