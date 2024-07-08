<?php

namespace App\Http\Controllers;

use App\Models\Owner;
use App\Models\Property;
use App\Models\PropertyOwner;
use App\Models\Tenant;
use App\Models\Unit;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class OwnersController extends Controller
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

     public function index(Request $request)
     {
          $owners = Owner::where('is_deleted', 0)->get();

          if ($request->ajax()) {
               return DataTables::of($owners)
                    ->addIndexColumn()

                    ->addColumn('owner', function ($row) {
                         $owner = ' 
                         <div class="content">
                            <div class="icon">
                                <img src="' . asset('owners_image/' . $row->image . ' ') . '" alt="">
                            </div>
                            <div class="txt">
                                <h6>' . $row->first_name . ' ' . $row->last_name . '</h6>
                            </div>
                        </div>';
                         return $owner;
                    })
                    ->addColumn('properties', function ($row) {
                         $property = '';

                         // Get the properties owned by the owner
                         $property_owners_pivert = PropertyOwner::where('owner_id', $row->id)->get();
                         // dd($property_owners_pivert);
                         if ($property_owners_pivert->count() > 0) {
                              foreach ($property_owners_pivert as $property_each) {
                                   // Count the number of rentals for each property
                                   $rentals = Tenant::where('unit_id', $property_each->Unit->id)->count();

                                   // Append property details and rental count to the $property string
                                   $property .= '<p>' . $property_each->Unit->unit_name . ' ,';
                                   $property .= ' (' . $rentals . '&nbsp;Rentals)</p>';
                              }
                         }


                         return $property;
                    })
                    ->addColumn('contact_Information', function ($row) {
                         return '<div class="c-info-table">
                                <a href="mailto:' . $row->email . '" class="blue"><i class="fas fa-envelope"></i> ' . $row->email . '</a>
                                <a href="tel:' . $row->phone_number . '"><i class="fas fa-phone"></i> ' . $row->phone_number . '</a>
                            </div>';
                    })

                    ->addColumn('action', function ($row) {
                         // $action = '<li class="last"><a href="javascript:;">Delete</a></li>';
                         $action = '<ul class="togg-btn">
                                    <li class="first"><i class="fal fa-ellipsis-h"></i></li>
                                    <ul class="togg-drop">
                                        <li class="first"><a href="' . route('edit_owner', $row->id) . '">Edit</a></li>
                                        <li class="last"><a href="javascript:;" onclick="deleteOwnerCofirm(' . $row->id . ')">Delete</a></li>
                                    </ul>
                               </ul>';
                         return $action;
                    })
                    ->rawColumns(['owner', 'properties', 'contact_Information', 'action'])
                    ->make(true);
          }
          return view('owners', get_defined_vars());
     }

     public function addowners()
     {
          $get_properties = Property::where('status', 0)->where('user_id', auth()->user()->id)->get();
          return view('create_owner', get_defined_vars());
     }

     public function create_owner(Request $request)
     {
          $validatedData = $request->validate([
               'first_name' => 'required|string|max:255',
               'last_name' => 'required|string|max:255',
               'email' => 'required|email|unique:owners,email|max:255',
               'phone_number' => 'required|string|max:20',
               'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
          ]);
          // dd($request->all());
          if ($request->hasFile('image')) {
               $attechments = $request->file('image');
               $thumb = time() . $attechments->getClientOriginalName();
               $attechments->move(public_path('owners_image/'), $thumb);
          }

          $owner = new Owner;
          $owner->first_name = $request->first_name;
          $owner->last_name = $request->last_name;
          $owner->email = $request->email;
          $owner->phone_number = $request->phone_number;
          $owner->image = $thumb;
          $owner->save();

          if ($request->has('units') != null) {
               foreach ($request->units as $unit) {

                    $unit_details = Unit::where('id', $unit)->first();
                    $property = Property::where('id', $unit_details->property_id)->first();

                    $property_owner = new PropertyOwner;
                    $property_owner->owner_id = $owner->id;
                    $property_owner->property_id = $property->id;
                    $property_owner->unit_id = $unit;
                    $property_owner->save();
               }
          }
          return redirect()->route('owners')->with('success', 'Owner created successfuly');
     }

     public function delete_owners($id)
     {
          Owner::where('id', $id)->update(array(
               'is_deleted' => 1
          ));
          return response()->json([
               'message' => 'success'
          ]);
     }

     public function edit_owner(Request $request, $id)
     {
          $owner_details = Owner::find($id);
          $property_owners = PropertyOwner::where('owner_id', $id)->get();
          $get_properties = Property::where('status', 0)->where('user_id', auth()->user()->id)->get();
          return view('edit_owner', get_defined_vars());
     }

     public function update_owner(Request $request, $id)
     {
          // dd($request->all());
          if ($request->hasFile('image')) {
               $attechments = $request->file('image');
               $thumb = time() . $attechments->getClientOriginalName();
               $attechments->move(public_path('owners_image/'), $thumb);
          } else {
               $owner_details = Owner::find($id);
               $thumb = $owner_details->image;
          }


          Owner::where('id', $id)->update(array(
               'first_name' => $request->first_name,
               'last_name' => $request->last_name,
               'email' => $request->email,
               'phone_number' => $request->phone_number,
               'image' => $thumb,
          ));

          if ($request->has('units') != null) {
               $owners = PropertyOwner::where('owner_id', $id)->whereIn('unit_id', $request->units)->delete();
               foreach ($request->units as $unit) {

                    $unit_details = Unit::where('id', $unit)->first();
                    $property = Property::where('id', $unit_details->property_id)->first();

                    $property_owner = new PropertyOwner;
                    $property_owner->owner_id = $id;
                    $property_owner->property_id = $property->id;
                    $property_owner->unit_id = $unit;
                    $property_owner->save();
               }
          }
          return redirect()->route('owners')->with('success', 'Owner updated successfuly');

     }
 
}
