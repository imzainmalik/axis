<?php

namespace App\Http\Controllers;

use App\Models\Owner;
use Illuminate\Http\Request;
use App\Models\Property;
use App\Models\PropertyOwner;
use App\Models\Unit;
use Yajra\DataTables\Facades\DataTables;

class PropertyController extends Controller
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

     public function add_new_property(Request $request)
     {
          $owner = Owner::where('is_deleted', 0)->get();
          return view('add_property', get_defined_vars());
     }

     public function create_property(Request $request)
     {
          // dd($request->all());
          $property = new Property;
          $property->user_id = auth()->user()->id;
          $property->property_type = $request->property_type;
          $property->property_name = $request->property_name;
          $property->address = $request->street1 . ', ' . $request->city . ', ' . $request->state . ' ' . $request->zipcode . ', ' . $request->country;
          $property->street1 = $request->street1;
          $property->street2 = $request->street2;
          $property->state = $request->state;
          $property->city = $request->city;
          $property->country = $request->country;
          $property->zipcode = $request->zipcode;
          $property->save();

          $unit_blank_array = [];
          // dd($request->unit_names);

          foreach ($request->unit_names as $key => $unit) {
               // dd($request->unit_number[$key]);
               $unit = new Unit;
               $unit->property_id = $property->id;
               $unit->unit_name = $request->unit_names[$key];
               $unit->unit_num = $request->unit_number[$key];
               $unit->bedrooms = $request->unit_beds[$key];
               $unit->bathrooms = $request->unit_bath[$key];
               $unit->square_feet = $request->unit_size[$key];
               $unit->property_rent_amount = $request->unit_amount[$key];
               $unit->save();
               array_push($unit_blank_array, $unit->id);

               if ($request->own_by == 'own_by_someoneelse') {
                    foreach ($request->owners as $owner) {
                         $property_owner = new PropertyOwner;
                         $property_owner->property_id = $property->id;
                         $property_owner->owner_id = $owner;
                         $property_owner->unit_id = $unit->id;
                         $property_owner->save();
                    }
               } else {
                    //  foreach ($request->owners as $owner) {
                    $property_owner = new PropertyOwner;
                    $property_owner->property_id = $property->id;
                    $property_owner->owner_id = auth()->user()->id;
                    $property_owner->unit_id = $unit->id;
                    $property_owner->save();
                    //  }
               }
          }
          // dd($unit_blank_array);


          return redirect()->back()->with('success', 'Property created succesfully');
     }

     public function properties(Request $request)
     {
          $data = Property::where('status', 0)->where('user_id', auth()->user()->id)->get();

          if ($request->ajax()) {
               // return response()->json($data);
               return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('property', function ($row) {
                         $property = '<a href="' . route("property_details", $row->id) . '">
                                    <div class="content">
                                        <div class="icon">';
                         // $property .=
                         if ($row->property_type == 0) {
                              $property  .=  '<img src="assets/images/pi3.png" alt="">';
                         } elseif ($row->property_type == 1) {
                              $property  .= '<img src="assets/images/pi2.png" alt="">';
                         } elseif ($row->property_type == 2) {
                              $property  .= '<img src="assets/images/pi1.png" alt="">';
                         } elseif ($row->property_type == 3) {
                              $property  .= '<img src="assets/images/pi2.png" alt="">';
                         }
                         $property  .= '</div>
                                    <div class="txt">
                                        <h6>' . $row->property_name . '</h6>
                                            <p><span><i class="fas fa-map-marker-alt"></i>
                                                ' . $row->address . '
                                                </span>
                                            </p>
                                        </div>
                                    </div>
                                </a>';

                         return $property;
                    })
                    ->addColumn('type', function ($row) {
                         if ($row->property_type == 0) {
                              $type = 'Office';
                         } elseif ($row->property_type == 1) {
                              $type = 'House';
                         } elseif ($row->property_type == 2) {
                              $type = 'Mall';
                         } elseif ($row->property_type == 3) {
                              $type = 'Condo';
                         }
                         return $type;
                    })
                    ->addColumn('units', function ($row) {
                         return $row->Units()->count() . ' Units';
                    })
                    ->addColumn('action', function ($row) {
                         // $action = '<li class="last"><a href="javascript:;">Delete</a></li>';
                         $action = '<ul class="togg-btn">
                                <li class="first"><i class="fal fa-ellipsis-h"></i></li>
                                <ul class="togg-drop">
                                    <li class="first"><a href="javascript:;">Edit</a></li>
                                    <li class="last"><a href="javascript:;">Delete</a></li>
                                </ul>
                            </ul>';
                         return $action;
                    })
                    ->rawColumns(['property', 'type', 'units', 'action'])
                    ->make(true);
          }

          return view('properties', get_defined_vars());
     }

     public function property_details(Request $request, $id)
     {
          if ($request->ajax()) {
               $data = Unit::where('property_id', $id)->get();

               return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('Unit', function ($row) {
                         $Unit = '<div class="content"style="width: 318px;">
                                    <div class="icon">
                                        <img src="' . asset("assets/images/pi2.png") . '" alt="">
                                    </div>
                                <div class="txt">
                                        <a href="' . route("units_details", $row->id) . '"><h6>' . $row->Property->property_name . ' &gt;
                                                    ' . $row->unit_name . '</h6></a>
                                                            <ul class="amenities-list">
                                                                <li class="first"><i class="fas-fa-bed"></i>
                                                                    ' . $row->bedrooms . ' Beds</li>
                                                                <li><i class="fas fa-bath"></i> ' . $row->bathrooms . ' Baths
                                                                </li>
                                                                <li class="last"><i class="fas fa-area"></i>
                                                                    ' . $row->square_feet . ' Sqft </li>
                                                            </ul>
                                                        </div>
                                                    </div>';

                         return $Unit;
                    })
                    ->addColumn('current_status', function ($row) {
                         return 'Vacant';
                    })
                    ->addColumn('listing_status', function ($row) {
                         if ($row->status == 0) {
                              $listing_status = 'Listed';
                         } else {
                              $listing_status = 'Not Listed';
                         }
                         return $listing_status;
                    })

                    ->addColumn('future_status', function ($row) {
                         if ($row->is_available == 0) {
                              $future_status = 'Availabel for Rent';
                         } else {
                              $future_status = 'Not Availabel for Rent';
                         }
                         return $future_status;
                    })
                    ->addColumn('open_application', function ($row) {
                         return '<p class="blue">Property address not valid</p>';
                    })

                    ->addColumn('action', function ($row) {
                         $action = '  <ul class="togg-btn">
                                                        <li class="first"><i class="fal fa-ellipsis-h"></i></li>
                                                        <ul class="togg-drop">
                                                            <li class="first"><a href="' . route('edit_unit', $row->id) . '">Edit</a>
                                                            </li>
                                                            <li class="last">';
                         if ($row->status == 0) {
                              $action .= '<a href="javascript:;" onclick="deleteUnitCofirm(' . $row->id . ')">Delist</a>';
                         } else {
                              $action .= '<a href="javascript:;" onclick="listUnitCofirm(' . $row->id . ')">List</a>';
                         }
                         $action .= '</li>
                                    </ul>
                                    </ul>';

                         return $action;
                    })
                    ->rawColumns(['Unit', 'current_status', 'future_status', 'listing_status', 'open_application', 'action'])
                    ->make(true);
          }
          return view('property_details', get_defined_vars());
     }

     public function units()
     {
          $get_properties = Property::where('status', 0)->where('user_id', auth()->user()->id)->get();
          return view('units', get_defined_vars());
     }

     public function create_units(Request $request)
     {
          // dd($request->all());
          // if($request->is_available == )
          $unit = new Unit();
          $unit->unit_name = $request->unit_name;
          $unit->property_id = $request->property_id;
          $unit->unit_num = $request->unit_num;
          $unit->bedrooms = $request->bedrooms;
          $unit->bathrooms = $request->bathrooms;
          $unit->square_feet = $request->square_feet;
          $unit->property_rent_amount = $request->property_rent_amount;
          $unit->is_available = $request->is_available;
          $unit->save();
          return redirect()->route('property_details', $request->property_id)->with('success', 'Unit created succesfully');
     }

     public function delete_unit($id)
     {
          Unit::where('id', $id)->update(array(
               'status' => 1
          ));
          return response()->json([
               'message' => 'success'
          ]);
     }

     public function list_unit($id)
     {
          Unit::where('id', $id)->update(array(
               'status' => 0
          ));
          return response()->json([
               'message' => 'success'
          ]);
     }

     public function edit_units($id)
     {
          $units = Unit::findorfail($id);
          $get_properties = Property::where('status', 0)->where('user_id', auth()->user()->id)->get();

          return view('edit_units', get_defined_vars());
     }

     public function update_units(Request $request, $id)
     {
          // dd($request->all());
          Unit::findorfail($id)->update(array(
               'unit_name' => $request->unit_name,
               'property_id' => $request->property_id,
               'unit_num' => $request->unit_num,
               'bedrooms' => $request->bedrooms,
               'bathrooms' => $request->bathrooms,
               'square_feet' => $request->square_feet,
               'property_rent_amount' => $request->property_rent_amount,
               'is_available' => $request->is_available,
          ));
          return redirect()->route('property_details', $request->property_id)->with('success', 'Listing has been updated successfuly.');
     }


     public function units_details($id)
     {
          // $unit_details = 
          return view('unit_details', get_defined_vars());
     }
}
