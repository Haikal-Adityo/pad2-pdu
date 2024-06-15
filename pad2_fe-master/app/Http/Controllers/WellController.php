<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\Well;
use App\Models\WellSensor;
use Illuminate\Support\Facades\Auth;

class WellController extends Controller
{
    public function show($id)
    {
        $user = Auth::user();

        $company = $user->company;

        $currentWell = Well::findOrFail($id);

        // Fetch the well by its ID
        $wells = Well::where('company_id', $company->company_id)->get();

        // Fetch sensors for the well
        $wellSensors = WellSensor::where('well_id', $id)->get();

        return view('well', [
            'companies' => [$company],
            'wells' => $wells,
            'currentWell' => $currentWell,
            'sensors' => $wellSensors,
        ]);
    }
}