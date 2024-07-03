<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;

class MapController extends Controller
{
    //

    public function index(){
        $property = Property::where('status', 0)->where('user_id',auth()->user()->id)->first();
        // dd($property);
        return view('map',get_defined_vars());
    }

    public function property($id){
        $property = Property::findorfail($id);
        return response()->json([
            'property' => $property,
           'message' => 200,
        ]);
    }
}
