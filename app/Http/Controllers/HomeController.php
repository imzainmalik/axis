<?php

namespace App\Http\Controllers;

use App\Models\Lease;
use App\Models\Unit;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $occupancyRate = $this->getOccupancyRate();
        // dd($occupancyRate);
        return view('dashbhoard', get_defined_vars());
    }

    private function getOccupancyRate()
    {
        $totalUnits = Unit::where('status', 0)->count();
        $occupiedUnits = Lease::where('lease_status', 'active')
                              ->where('end_date', '>=', Carbon::now())
                              ->count();
        $vacantUnits = $totalUnits - $occupiedUnits;

        $occupiedPercentage = $totalUnits ? ($occupiedUnits / $totalUnits) * 100 : 0;
        $vacantPercentage = $totalUnits ? ($vacantUnits / $totalUnits) * 100 : 0;
        // dd($occupiedPercentage, $vacantPercentage);
        return [
            'occupied' => $occupiedUnits,
            'vacant' => $vacantUnits,
            'occupied_percentage' => $occupiedPercentage,
            'vacant_percentage' => $vacantPercentage,
        ];
    }


}
