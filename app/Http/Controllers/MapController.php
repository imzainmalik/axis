<?php

namespace App\Http\Controllers;

use App\Models\Property;
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
    public function index(){
        $properties = Property::where('status', 0)->where('user_id',auth()->user()->id)->get();
        // dd($property);
        return view('map',get_defined_vars());
    }

    public function property($id){
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
}
