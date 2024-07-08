<?php

namespace App\Http\Controllers;

use App\Models\Lease;
use App\Models\MonthlyRent;
use App\Models\Task;
use App\Models\Unit;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
    public function index(Request $request)
    {
        $occupancyRate = $this->getOccupancyRate();
        // dd($occupancyRate);

        $currentDate = Carbon::now();
        $plus7days = Carbon::now()->addDays(7);
        $sub7days = Carbon::now()->subDays(7);
        
        // dd($sub7days->format('Y-m-d'));
        $leasingActivities = Lease::whereBetween('end_date',[$currentDate, $plus7days])->get();
        $leaseWithoutstanding_balance = MonthlyRent::where('payment_status','Unpaid')->get();
        $task_due_date = Task::where('due_date','<',$currentDate)->get();
        $recent_payment_recieved = MonthlyRent::latest('payment_date')->limit(7)->get();
       
        $endDate = Carbon::now()->addDays(7)->endOfDay();

        // Query for tasks due within the next 7 days
        $tasksDueInNext7Days = Task::whereBetween('due_date', [$currentDate, $endDate])->get();
        // dd($tasksDueInNext7Days);   
        $tasksByStatus = Task::select('status', DB::raw('count(*) as total'))
            ->groupBy('status')
            ->get();
            // dd($tasksByStatus);
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
        // dd(round($occupiedPercentage), round($vacantPercentage));
        return [    
            'occupied' => $occupiedUnits,
            'vacant' => $vacantUnits,
            'occupied_percentage' => round($occupiedPercentage),
            'vacant_percentage' => round($vacantPercentage),
        ];
    }
}
