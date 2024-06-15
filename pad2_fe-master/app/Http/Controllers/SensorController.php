<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Well;
use App\Models\WellSensor;
use Illuminate\Support\Facades\Auth;

class SensorController extends Controller
{
    public function show($well_id, $sensor_id)
    {
        // Ensure user is authenticated and fetch the associated company
        $user = Auth::user();
        $company = $user->company;

        // Fetch the current well based on $well_id
        $currentWell = Well::findOrFail($well_id);

        // Fetch all wells associated with the user's company
        $wells = Well::where('company_id', $company->company_id)->get();

        // Fetch sensors for the specific well ($well_id)
        $wellSensors = WellSensor::where('well_id', $well_id)->get();

        // Return view with data for the well and its sensors
        return view('wellSensor', [
            'companies' => [$company],
            'wells' => $wells,
            'currentWell' => $currentWell,
            'sensors' => $wellSensors,
            'currentSensorId' => $sensor_id,
        ]);
    }
}
