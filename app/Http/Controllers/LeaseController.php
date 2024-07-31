<?php

namespace App\Http\Controllers;

use App\Models\Lease;
use App\Models\Owner;
use App\Models\Property;
use App\Models\Tenant;
use App\Models\Unit;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class LeaseController extends Controller
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

     public function leases(Request $request)
     {
          $lease = Lease::where('user_id', auth()->user()->id)->get();
          // dd($lease);
          if ($request->ajax()) {
               return DataTables::of($lease)
                    ->addColumn('owner', function ($row) {
                         $owner = ' 
                        <div class="content">
                            <div class="icon">
                                <img src="' . asset('owners_image/' . $row->Owners->image . ' ') . '" alt="">
                            </div>
                            <div class="txt">
                                <h6>' . $row->Owners->first_name . ' ' . $row->Owners->last_name . '</h6> <br>
                                <p>' . $row->Owners->email . '</p>
                            </div>
                        </div>';
                         // dd($owner);
                         return $owner;
                         // | '. $row->Owners->Unit->unit_name. 
                    })
                    ->addColumn('tenant', function ($row) {
                         $tenant = ' 
                              <div class="content">
                                   <div class="icon">
                                        <img src="' . asset('owners_image/' . $row->Tenant->image . '') . '" alt="">
                                   </div>
                                   <div class="txt">
                                        <h6>' . $row->Tenant->first_name . ' ' . $row->Tenant->last_name . '</h6> <br>
                                        <p>' . $row->Tenant->email . '</p>
                                   </div>
                              </div>';
                         // dd($owner);
                         return $tenant;
                         // | '. $row->Owners->Unit->unit_name.
                    })

                    ->addColumn('property', function ($row) {
                         if ($row->property_type == 0) {
                              $type = 'Office';
                         } elseif ($row->property_type == 1) {
                              $type = 'House';
                         } elseif ($row->property_type == 2) {
                              $type = 'Mall';
                         } elseif ($row->property_type == 3) {
                              $type = 'Condo';
                         }
                         $property = ' 
                        <div class="content">
                            <div class="txt">
                                <h6>' . $row->Unit->Property->property_name . '</h6> <br>
                                <p> ' . $type . '</p> <br>
                                <p>' . $row->Unit->Property->address . '</p>
                            </div>
                        </div>';
                         // dd($owner);
                         return $property;
                         // | '. $row->Owners->Unit->unit_name. 
                    })

                    ->addColumn('unit', function ($row) {
                         $unit = ' 
                        <div class="content"> 
                            <div class="txt">
                                <h6>' . $row->Unit->unit_name . '</h6> <br>
                                <p>' . $row->Unit->Property->address . '</p>
                            </div>
                        </div>';
                         // dd($owner);
                         return $unit;
                         // | '. $row->Owners->Unit->unit_name. 
                    })

                    ->addColumn('action', function ($row) {
                         $btn = ' <ul class="togg-btn">
                                <li class="first"><i class="fal fa-ellipsis-h"></i></li>
                                <ul class="togg-drop">
                                    <li class="first"><a href="' . route('lease_edit', $row->id) . '">Edit</a></li>';
                         if ($row->lease_status == 'active') {
                              $btn .= ' <li class="last"><a href="javascript:;" onclick="lease_inactive(' . $row->id . ')">InActivate</a></li>';
                         } else {
                              $btn .= ' <li class="last"><a href="javascript:;" onclick="lease_activate(' . $row->id . ')">Activate</a></li>';
                         }

                         $btn .= '</ul>
                            </ul>';
                         return $btn;
                    })
                    ->rawColumns(['action', 'owner', 'tenant', 'property', 'unit'])
                    ->make(true);
          }
          return view('lease', get_defined_vars());
     }

     public function lease_inactive($id)
     {
          Lease::where('id', $id)->update(array(
               'lease_status' => 'inactive'
          ));
          return response()->json([
               'message' => 'success'
          ]);
     }

     public function lease_activate($id)
     {
          Lease::where('id', $id)->update(array(
               'lease_status' => 'active'
          ));
          return response()->json([
               'message' => 'success'
          ]);
     }

     public function edit($id)
     {
          $lease = Lease::findorfail($id);
          $properties = Property::where('status', 0)->where('user_id', auth()->user()->id)->get();
          // dd($properties['id']);
          $units = Unit::where('id', $lease->unit_id)->where('status', 0)->get();

          $tenants = Tenant::where('tenant_added_by', auth()->user()->id)->get();
          $owners = Owner::where('is_deleted', 0)->get();

          return view('edit_lease', get_defined_vars());
     }

     public function update(Request $request, $id)
     {
          // dd($request->all());
          Lease::findorfail($id)->update(array(
               // 'property_id' => $request->property_id,
               'unit_id' => $request->unit_id,
               'tenant_id' => $request->tenant_id,
               'owner_id' =>  $request->owner_id,
               'start_date' => $request->start_date,
               'end_date' => $request->end_date,
               'rent_amount' => $request->rent_amount,
          ));

          Unit::findorfail($request->unit_id)->update(array(
               'is_available' => 1
          ));

          return redirect()->route('leases')->with('success', 'Lease updated succesfully');
     }

     public function lease_add()
     {
          $properties = Property::where('status', 0)->where('user_id', auth()->user()->id)->get();
          $tenants =  Tenant::where('tenant_added_by', auth()->user()->id)->get();
          $owners = Owner::where('is_deleted', 0)->get();
          return view('create_lease', get_defined_vars());
     }

     public function create_lease(Request $request)
     {
          // dd($request->all());
          $lease = new Lease;
          $lease->unit_id = $request->unit_id;
          $lease->tenant_id = $request->tenant_id;
          $lease->owner_id = $request->owner_id;
          $lease->start_date = $request->start_date;
          $lease->end_date = $request->end_date;
          $lease->rent_amount = $request->rent_amount;
          $lease->user_id = auth()->user()->id;
          $lease->save();

          Unit::findorfail($request->unit_id)->update(array(
               'is_available' => 1
          ));

          return redirect()->route('leases')->with('success', 'Lease created succesfully');
     }
}
