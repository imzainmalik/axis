<?php

namespace App\Http\Controllers;

use App\Models\Lease;
use App\Models\MonthlyRent;
use App\Models\Property;
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


     public function getPRo()
     {

          // GET ACCESS TOKEN POST ROUTE
          $curl = curl_init();

          curl_setopt_array($curl, array(
               CURLOPT_URL => 'https://developers.cjdropshipping.com/api2.0/v1/authentication/getAccessToken',
               CURLOPT_RETURNTRANSFER => true,
               CURLOPT_ENCODING => '',
               CURLOPT_MAXREDIRS => 10,
               CURLOPT_TIMEOUT => 0,
               CURLOPT_FOLLOWLOCATION => true,
               CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
               CURLOPT_CUSTOMREQUEST => 'POST',
               CURLOPT_POSTFIELDS => '{
          "email": "imzainmalik557@gmail.com",
          "password": "1b03540e0a8e418dbe0bf00ed5e7c323"
          }',
               CURLOPT_HTTPHEADER => array(
                    'Content-Type: application/json'
               ),
          ));

          $response = curl_exec($curl);

          curl_close($curl);
          echo $response;

          // GET ALL CATEGORIES GET ROUTE
          $curl = curl_init();

          curl_setopt_array($curl, array(
               CURLOPT_URL => 'https://developers.cjdropshipping.com/api2.0/v1/product/getCategory',
               CURLOPT_RETURNTRANSFER => true,
               CURLOPT_ENCODING => '',
               CURLOPT_MAXREDIRS => 10,
               CURLOPT_TIMEOUT => 0,
               CURLOPT_FOLLOWLOCATION => true,
               CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
               CURLOPT_CUSTOMREQUEST => 'GET', 
               CURLOPT_HTTPHEADER => array(
                    'CJ-Access-Token: eyJhbGciOiJIUzI1NiJ9.eyJqdGkiOiIxODA3MSIsInR5cGUiOiJBQ0NFU1NfVE9LRU4iLCJzdWIiOiJicUxvYnFRMGxtTm55UXB4UFdMWnlrZC94c1llWU12WFhnbkF1bjBGSDZrdXhsZUJ6elRHSlRjMzJPVzZyK2lRcGlLL1BDTklzN1N4aHNrbkpNOHpyRmE1ZzdhamI1RWFsR2E3bzhtckpWLzVOYThkeU1TT2U1bEhMb0theDhnWXBNcnNFdi9tVFdtbzVHZUpsVk9nWmZidGRGa0N3R3cvOWM4YThVY2tsbWFHWDBwUkV0TXgvVG5EL0Y1TkZwSE0wTWVPMUM1Wm1ZUDFWbXdoeVVRR0VvL2JOd2lnMTFXVi9DaVdGVllkWUQ0cStSZEYrMUcwOWVsaGgwalc2b1o1OENXdkJmOHF4SjZGZlJhZGw2Y01qTTkyb25wMDJLMlQwenI2MkY3SjFLST0ifQ.eytWjXEumNJm0qv-GjtsxKhu7JwgKZqP4CGspTJkkfI',
                    'Content-Type: application/json'
               ),
          ));

          $response = curl_exec($curl);

          curl_close($curl);
          echo $response;



          // GET ALL PRODUCTS BY CATEGORY GET ROUTE
          $curl = curl_init();

          curl_setopt_array($curl, array(
          CURLOPT_URL => 'https://developers.cjdropshipping.com/api2.0/v1/product/list?categoryId=CC4A7507-4A32-40CC-B053-825C73F705CA',
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'GET',
          CURLOPT_HTTPHEADER => array(
               'CJ-Access-Token: eyJhbGciOiJIUzI1NiJ9.eyJqdGkiOiIxODA3MSIsInR5cGUiOiJBQ0NFU1NfVE9LRU4iLCJzdWIiOiJicUxvYnFRMGxtTm55UXB4UFdMWnlrZC94c1llWU12WFhnbkF1bjBGSDZrdXhsZUJ6elRHSlRjMzJPVzZyK2lRcGlLL1BDTklzN1N4aHNrbkpNOHpyRmE1ZzdhamI1RWFsR2E3bzhtckpWLzVOYThkeU1TT2U1bEhMb0theDhnWXBNcnNFdi9tVFdtbzVHZUpsVk9nWmZidGRGa0N3R3cvOWM4YThVY2tsbWFHWDBwUkV0TXgvVG5EL0Y1TkZwSE0wTWVPMUM1Wm1ZUDFWbXdoeVVRR0VvL2JOd2lnMTFXVi9DaVdGVllkWUQ0cStSZEYrMUcwOWVsaGgwalc2b1o1OENXdkJmOHF4SjZGZlJhZGw2Y01qTTkyb25wMDJLMlQwenI2MkY3SjFLST0ifQ.eytWjXEumNJm0qv-GjtsxKhu7JwgKZqP4CGspTJkkfI'
          ),
          ));

          $response = curl_exec($curl);

          curl_close($curl);
          echo $response;


          // GET PRODUCTS DETAILS GET ROUTE

          $curl = curl_init();

          curl_setopt_array($curl, array(
          CURLOPT_URL => 'https://developers.cjdropshipping.com/api2.0/v1/product/query?pid=2407310325271614000',
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'GET',
          CURLOPT_HTTPHEADER => array(
               'CJ-Access-Token: eyJhbGciOiJIUzI1NiJ9.eyJqdGkiOiIxODA3MSIsInR5cGUiOiJBQ0NFU1NfVE9LRU4iLCJzdWIiOiJicUxvYnFRMGxtTm55UXB4UFdMWnlrZC94c1llWU12WFhnbkF1bjBGSDZrdXhsZUJ6elRHSlRjMzJPVzZyK2lRcGlLL1BDTklzN1N4aHNrbkpNOHpyRmE1ZzdhamI1RWFsR2E3bzhtckpWLzVOYThkeU1TT2U1bEhMb0theDhnWXBNcnNFdi9tVFdtbzVHZUpsVk9nWmZidGRGa0N3R3cvOWM4YThVY2tsbWFHWDBwUkV0TXgvVG5EL0Y1TkZwSE0wTWVPMUM1Wm1ZUDFWbXdoeVVRR0VvL2JOd2lnMTFXVi9DaVdGVllkWUQ0cStSZEYrMUcwOWVsaGgwalc2b1o1OENXdkJmOHF4SjZGZlJhZGw2Y01qTTkyb25wMDJLMlQwenI2MkY3SjFLST0ifQ.eytWjXEumNJm0qv-GjtsxKhu7JwgKZqP4CGspTJkkfI'
          ),
          ));

          $response = curl_exec($curl);

          curl_close($curl);
          echo $response;
     }

     /**
      * Show the application dashboard.
      *
      * @return \Illuminate\Contracts\Support\Renderable
      */
     public function index(Request $request)
     {
          if ($request->property_id != null) {
               $occupancyRate = $this->getOccupancyRate($request);
               // dd($occupancyRate);
               $property_details = Unit::where('property_id', $request->property_id)->get()->pluck('id');

               $currentDate = Carbon::now();
               $plus7days = Carbon::now()->addDays(7);
               $sub7days = Carbon::now()->subDays(7);
               // if ($property_details != null) {
               // }
               // dd($sub7days->format('Y-m-d'));
               $leasingActivities = Lease::whereBetween('end_date', [$currentDate, $plus7days])
                    ->whereIn('unit_id', $property_details)->get();

               $leaseWithoutstanding_balance = MonthlyRent::where('payment_status', 'Unpaid')->whereIn('unit_id', $property_details)->get();
               $task_due_date = Task::where('due_date', '<', $currentDate)->whereIn('unit', $property_details)->get();
               $recent_payment_recieved = MonthlyRent::latest('payment_date')->limit(7)->whereIn('unit_id', $property_details)->get();

               $endDate = Carbon::now()->addDays(7)->endOfDay();

               // Query for tasks due within the next 7 days
               $tasksDueInNext7Days = Task::whereBetween('due_date', [$currentDate, $endDate])->whereIn('unit', $property_details)->get();
               // dd($tasksDueInNext7Days);   
               $tasksByStatus = Task::whereIn('unit', $property_details)->select('status', DB::raw('count(*) as total'))
                    ->groupBy('status')
                    ->get();

               return view('dashbhoard', get_defined_vars());
          } else {
               $occupancyRate = $this->getOccupancyRate($request);
               // dd($occupancyRate);

               $currentDate = Carbon::now();
               $plus7days = Carbon::now()->addDays(7);
               $sub7days = Carbon::now()->subDays(7);

               // dd($sub7days->format('Y-m-d'));
               $leasingActivities = Lease::whereBetween('end_date', [$currentDate, $plus7days])->get();
               $leaseWithoutstanding_balance = MonthlyRent::where('payment_status', 'Unpaid')->get();
               $task_due_date = Task::where('due_date', '<', $currentDate)->get();
               $recent_payment_recieved = MonthlyRent::latest('payment_date')->limit(7)->get();

               $endDate = Carbon::now()->addDays(7)->endOfDay();

               // Query for tasks due within the next 7 days
               $tasksDueInNext7Days = Task::whereBetween('due_date', [$currentDate, $endDate])->get();
               // dd($tasksDueInNext7Days);   
               $tasksByStatus = Task::select('status', DB::raw('count(*) as total'))
                    ->groupBy('status')
                    ->get();
               return view('dashbhoard', get_defined_vars());
          }

          // dd($tasksByStatus);
     }

     private function getOccupancyRate(Request $request)
     {
          if ($request->property_id != null) {

               $property_details = Unit::where('property_id', $request->property_id)->get()->pluck('id');

               $totalUnits = Unit::where('status', 0)->where('property_id', $request->property_id)->count();
               
               if ($property_details->count() > 0) { 
                         $occupiedUnits = Lease::where('lease_status', 'active')
                         ->whereIn('unit_id', $property_details)
                         ->where('end_date', '>=', Carbon::now())
                         ->count(); 
               } else {
                    $occupiedUnits = 0;
               }
               
            //   dd($occupiedUnits);

                // dd($occupiedUnits, $totalUnits);
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
          } else {
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
}
