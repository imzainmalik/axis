<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;
use App\Models\Unit;
use App\Models\Lease;
use App\Models\MonthlyRent;
use Carbon\Carbon;
use App\Models\Tenant;
use Yajra\DataTables\Facades\DataTables;

class ReportController extends Controller
{
     //
     /**
      * Create a new controller instance.
      *
      * @return void
      */
     public function __construct()
     {
          $this->middleware('auth');
     }

     public function index()
     {
          $month = Carbon::now()->format('Y-m-d');

          $firstDayofPreviousMonth = Carbon::now()->startOfMonth()->toDateString();
          $lastDayofPreviousMonth = Carbon::now()->subMonth()->endOfMonth()->toDateString();
          // dd($firstDayofPreviousMonth, $lastDayofPreviousMonth, $month);
          // Query for total assets (e.g., property value + rent due)
          $totalAssets = Unit::sum('property_rent_amount') + MonthlyRent::where('payment_status', 'Unpaid')->sum('amount');

          // Query for total liabilities (e.g., unpaid rent)
          $totalLiabilities = MonthlyRent::where('payment_status', 'Unpaid')->sum('amount');

          // Query for owner's equity (assets - liabilities)
          $ownersEquity = $totalAssets - $totalLiabilities;


          $totalAssetsByMonth = Unit::sum('property_rent_amount') + MonthlyRent::where('payment_status', 'Unpaid')
               ->where('month_year', 'like', "$firstDayofPreviousMonth%")->sum('amount');

          $totalLiabilitiesByMonth = MonthlyRent::where('payment_status', 'Unpaid')
               ->where('month_year', 'like', "$firstDayofPreviousMonth%")->sum('amount');

          $ownersEquityByMonth = $totalAssetsByMonth - $totalLiabilitiesByMonth;

          $currentTenants = Tenant::where('is_deleted', 0)
               ->where('lease_end_date', '>', Carbon::now())
               ->get();

          $income = MonthlyRent::where('payment_status', 'Paid')
               ->where('payment_date', 'like', "$firstDayofPreviousMonth%")->sum('amount');

          $rentRoll = Lease::with('Unit', 'Tenant')->where('lease_status', 'active')->get();

          $upcomingMoveIns = Tenant::where('lease_start_date', '>', Carbon::now())
               ->where('lease_start_date', '<=', Carbon::now()->addMonth())
               ->get();

          $upcomingMoveOuts = Tenant::where('lease_end_date', '>', Carbon::now())
               ->where('lease_end_date', '<=', Carbon::now()->addMonth())
               ->get();


          $totalProperties = Property::count();
          $totalUnits = Unit::count();
          $totalTenants = Tenant::where('is_deleted', 0)->count();
          $totalRentCollected = MonthlyRent::where('payment_status', 'Paid')->sum('amount');

          // dd()
          return view('report', get_defined_vars());
     }

     public function current_tenant(Request $request)
     {

          $currentTenants = Tenant::where('is_deleted', 0)
               ->where('lease_end_date', '>', Carbon::now())
               ->get();
          $count = 1;
          if ($request->ajax()) {
               return DataTables::of($currentTenants, $count) 
                    ->addIndexColumn() 
                    ->addColumn('id', function ($row) {
                         static $count = 1;
                         return $count++;
                    })
                    ->addColumn('tenant', function ($row) {
                         return '
                              <div class="content">
                                   <div class="icon">
                                        <img src="' . asset('tenants_image/' . $row->image . ' ') . '" alt="">
                                   </div>
                                   <div class="txt">
                                        <h6>' . $row->first_name . ' <span class="current">Current</span></h6> 
                                             <p>' . $row->Unit->Property->property_name . ' | ' . $row->Unit->unit_name . '</p>
                                   </div>
                              </div>';
                         })
                    ->addColumn('contact_Info', function ($row) {
                         $contact = '<div class="c-info-table">';
                         if ($row->email == null) {
                              $contact .= ' <a href="javascript:;" class="blue" data-bs-toggle="modal"
                           data-bs-target="#addmailModal_' . $row->id . '"><i
                               class="fas fa-envelope"></i> Add Email Address</a>';
                         } else {
                              $contact .= '<a href="mailto:' . $row->email . '" class="blue"><i
                               class="fas fa-envelope"></i> Mail to Tenants</a>';
                         }
                         $contact .= '<a href="tel:' . $row->phone_number . '"><i
                       class="fas fa-phone"></i> ' . $row->phone_number . '</a>
                       </div>';
                         return $contact;
                    })
                    ->addColumn('balance', function ($row) {
                         $totalDueBalanceByeach = 0;
                         $dueBalanceByeach =  MonthlyRent::where('tenant_id', $row->id,)
                              ->where('payment_status', 'Unpaid') // Assuming month_year is stored as 'Y-m'
                              ->sum('amount');

                         $totalDueBalanceByeach += $dueBalanceByeach;

                         return '  <p class="red-txt">FCFA ' . $totalDueBalanceByeach . '</p>';
                    })

                    ->addColumn('action', function ($row) {
                         // $action = '<li class="last"><a href="javascript:;">Delete</a></li>';
                         $action = '<ul class="togg-btn">
                       <li class="first"><i class="fal fa-ellipsis-h"></i></li>
                       <ul class="togg-drop">
                           <li class="first"><a href="' . route('edit_tenants', $row->id) . '">Edit</a></li>
                           <li class="last"><a href="javascript:;" onclick="deleteTenantCofirm(' . $row->id . ')">Delete</a></li>
                           <li class="last"><a href="' . route('payment_history', $row->id) . '">Payment history</a></li>
                       </ul>
                   </ul>';
                         return $action;
                    })
                    ->rawColumns(['id','tenant', 'contact_Info', 'balance', 'action'])
                    ->make(true);
          }

          return view('current_tenants');
     }

     public function rent_roll(Request $request){
          $rentRoll = Lease::with('Unit', 'Tenant')->where('lease_status', 'active')->get();

          if($request->ajax()){
               return DataTables::of($rentRoll)
               ->addColumn('unit_num', function($row) {
                   return $row->Unit->unit_num;
               })
               ->addColumn('tenant_name', function($row) {
                   return $row->Tenant->first_name . '' .$row->Tenant->last_name;
               })
               ->addColumn('id', function ($row) {
                   static $count = 1;
                   return $count++;
               })
               ->rawColumns(['id','tenant_name', 'unit_num'])
               ->make(true);
          }
          return view('rent_roll');
     }

     public function upcoming_move_ins(Request $request){
          $upcomingMoveIns = Tenant::where('lease_start_date', '>', Carbon::now())
               ->where('lease_start_date', '<=', Carbon::now()->addMonth())
               ->get();
          if($request->ajax()){

               return DataTables::of($upcomingMoveIns) 
               ->addIndexColumn() 
               ->addColumn('id', function ($row) {
                    static $count = 1;
                    return $count++;
               })
               ->addColumn('tenant', function ($row) {
                    return '
                         <div class="content">
                              <div class="icon">
                                   <img src="' . asset('tenants_image/' . $row->image . ' ') . '" alt="">
                              </div>
                              <div class="txt">
                                   <h6>' . $row->first_name . ' <span class="current">Current</span></h6> 
                                        <p>' . $row->Unit->Property->property_name . ' | ' . $row->Unit->unit_name . '</p>
                              </div>
                         </div>';
                    })
               ->addColumn('contact_Info', function ($row) {
                    $contact = '<div class="c-info-table">';
                    if ($row->email == null) {
                         $contact .= ' <a href="javascript:;" class="blue" data-bs-toggle="modal"
                      data-bs-target="#addmailModal_' . $row->id . '"><i
                          class="fas fa-envelope"></i> Add Email Address</a>';
                    } else {
                         $contact .= '<a href="mailto:' . $row->email . '" class="blue"><i
                          class="fas fa-envelope"></i> Mail to Tenants</a>';
                    }
                    $contact .= '<a href="tel:' . $row->phone_number . '"><i
                  class="fas fa-phone"></i> ' . $row->phone_number . '</a>
                  </div>';
                    return $contact;
               })
               ->addColumn('balance', function ($row) {
                    $totalDueBalanceByeach = 0;
                    $dueBalanceByeach =  MonthlyRent::where('tenant_id', $row->id,)
                         ->where('payment_status', 'Unpaid') // Assuming month_year is stored as 'Y-m'
                         ->sum('amount');

                    $totalDueBalanceByeach += $dueBalanceByeach;

                    return '  <p class="red-txt">FCFA ' . $totalDueBalanceByeach . '</p>';
               })

               ->addColumn('action', function ($row) {
                    // $action = '<li class="last"><a href="javascript:;">Delete</a></li>';
                    $action = '<ul class="togg-btn">
                  <li class="first"><i class="fal fa-ellipsis-h"></i></li>
                  <ul class="togg-drop">
                      <li class="first"><a href="' . route('edit_tenants', $row->id) . '">Edit</a></li>
                      <li class="last"><a href="javascript:;" onclick="deleteTenantCofirm(' . $row->id . ')">Delete</a></li>
                      <li class="last"><a href="' . route('payment_history', $row->id) . '">Payment history</a></li>
                  </ul>
              </ul>';
                    return $action;
               })
               ->rawColumns(['id','tenant', 'contact_Info', 'balance', 'action'])
               ->make(true);
          }
          return view('upcoming_movein');
     }

     public function upcoming_move_outs(Request $request){
          $upcomingMoveOuts = Tenant::where('lease_end_date', '>', Carbon::now())
          ->where('lease_end_date', '<=', Carbon::now()->addMonth())
          ->get();
          if($request->ajax()){

               return DataTables::of($upcomingMoveOuts) 
               ->addIndexColumn() 
               ->addColumn('id', function ($row) {
                    static $count = 1;
                    return $count++;
               })
               ->addColumn('tenant', function ($row) {
                    return '
                         <div class="content">
                              <div class="icon">
                                   <img src="' . asset('tenants_image/' . $row->image . ' ') . '" alt="">
                              </div>
                              <div class="txt">
                                   <h6>' . $row->first_name . ' <span class="current">Current</span></h6> 
                                        <p>' . $row->Unit->Property->property_name . ' | ' . $row->Unit->unit_name . '</p>
                              </div>
                         </div>';
                    })
               ->addColumn('contact_Info', function ($row) {
                    $contact = '<div class="c-info-table">';
                    if ($row->email == null) {
                         $contact .= ' <a href="javascript:;" class="blue" data-bs-toggle="modal"
                      data-bs-target="#addmailModal_' . $row->id . '"><i
                          class="fas fa-envelope"></i> Add Email Address</a>';
                    } else {
                         $contact .= '<a href="mailto:' . $row->email . '" class="blue"><i
                          class="fas fa-envelope"></i> Mail to Tenants</a>';
                    }
                    $contact .= '<a href="tel:' . $row->phone_number . '"><i
                  class="fas fa-phone"></i> ' . $row->phone_number . '</a>
                  </div>';
                    return $contact;
               })
               ->addColumn('balance', function ($row) {
                    $totalDueBalanceByeach = 0;
                    $dueBalanceByeach =  MonthlyRent::where('tenant_id', $row->id,)
                         ->where('payment_status', 'Unpaid') // Assuming month_year is stored as 'Y-m'
                         ->sum('amount');

                    $totalDueBalanceByeach += $dueBalanceByeach;

                    return '  <p class="red-txt">FCFA ' . $totalDueBalanceByeach . '</p>';
               })

               ->addColumn('action', function ($row) {
                    // $action = '<li class="last"><a href="javascript:;">Delete</a></li>';
                    $action = '<ul class="togg-btn">
                  <li class="first"><i class="fal fa-ellipsis-h"></i></li>
                  <ul class="togg-drop">
                      <li class="first"><a href="' . route('edit_tenants', $row->id) . '">Edit</a></li>
                      <li class="last"><a href="javascript:;" onclick="deleteTenantCofirm(' . $row->id . ')">Delete</a></li>
                      <li class="last"><a href="' . route('payment_history', $row->id) . '">Payment history</a></li>
                  </ul>
              </ul>';
                    return $action;
               })
               ->rawColumns(['id','tenant', 'contact_Info', 'balance', 'action'])
               ->make(true);
          }
          return view('upcoming_moveout');
     }
}
