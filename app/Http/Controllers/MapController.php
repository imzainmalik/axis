<?php

namespace App\Http\Controllers;

use App\Models\MonthlyRent;
use App\Models\Property;
use App\Models\Unit;
use Carbon\Carbon;
use Illuminate\Http\Request;

class MapController extends Controller
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
          $properties = Property::where('status', 0)->where('user_id', auth()->user()->id)->get();
          // dd($property);
          $units = Unit::where('status', 0)->get();

          return view('map', get_defined_vars());
     }

     public function property($id)
     {
          $property = Property::findorfail($id);
          if ($property->property_type == 0) {
               $type = 'Office';
          } elseif ($property->property_type == 1) {
               $type = 'House';
          } elseif ($property->property_type == 2) {
               $type = 'Mall';
          } elseif ($property->property_type == 3) {
               $type = 'Condo';
          }
          // $property_type = 
          return response()->json([
               'property' => $property,
               'property_type' => $type,
               'units' => $property->Units()->count(),
               'tenants' => $property->Tenants()->count(),
               'owners' => $property->owners()->count(),
               'message' => 200,
          ]);
     }

     public function get_map_data()
     {
          $currentDate = Carbon::now()->format("Y-m-d");
          $units = Unit::where('status', 0)->get(['id', 'unit_num']);

          $unitIds = $units->pluck('id');

          // Retrieve pending rent for the retrieved units
          $pendingRent = MonthlyRent::whereIn('unit_id', $unitIds)
               ->where('payment_date', '>=', $currentDate) 
               ->get();
          // dd($pendingRent);
          // Group pending rent by unit_id for easier access in JavaScript
          $groupedPendingRent = $pendingRent->groupBy('unit_id');

          return response()->json([
               'units' => $units,
               'pending_rent' => $groupedPendingRent,
               'message' => 200,
          ]);
     }
}
