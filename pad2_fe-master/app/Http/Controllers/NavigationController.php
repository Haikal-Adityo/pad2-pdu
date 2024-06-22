<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\Well;
use App\Models\WellSensor;
use Illuminate\Support\Facades\Auth;

class NavigationController extends Controller
{
    /**
     * Display the navigation view or redirect to dashboard if authenticated.
     *
     * @return \Illuminate\View\View|\Illuminate\Http\RedirectResponse
     */
    public function showDashboard()
    {
        // Fetch authenticated user
        $user = Auth::user();

        // Check if user exists and has a company
        if ($user && $user->company) {
            // Fetch the company associated with the user
            $company = $user->company;

            // Fetch wells for the company (if needed)
            $wells = Well::where('company_id', $company->company_id)->get();

            // Return view with data for navigation
            return view('dashboard', [
                'companies' => [$company],
                'wells' => $wells,
            ]);
        }

        return redirect()->route('login');
    }

    public function showHistory()
    {
        // Fetch authenticated user
        $user = Auth::user();

        // Check if user exists and has a company
        if ($user && $user->company) {
            // Fetch the company associated with the user
            $company = $user->company;

            // Fetch wells for the company (if needed)
            $wells = Well::where('company_id', $company->company_id)->get();

            // Return view with data for navigation
            return view('history', [
                'companies' => [$company],
                'wells' => $wells,
            ]);
        }

        return redirect()->route('login');
    }



}
