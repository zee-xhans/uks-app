<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;
use App\Models\Medicine;

class DashboardController extends Controller
{
    public function index()
    {
        $totalPatients = \App\Models\Patient::count();
        $totalMedicines = \App\Models\Medicine::count();
        $todayCount = \App\Models\Patient::whereDate('visit_date', today())->count();

        return view('dashboard', compact('totalPatients', 'totalMedicines', 'todayCount'));
    }
}
