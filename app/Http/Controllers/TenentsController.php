<?php

namespace App\Http\Controllers;

use App\Models\Lease;
use App\Models\MonthlyRent;
use App\Models\Property;
use App\Models\PropertyOwner;
use App\Models\Tenant;
use App\Models\Unit;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class TenentsController extends Controller
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

     public function tenants(Request $request)
     {
          // $properties = Property::where('user_id', auth()->user()->id)->get();
          // dd($properties->Units);
          $get_tenants = Tenant::where('tenant_added_by', auth()->user()->id)->where('is_deleted', 0)->get();

          if ($request->ajax()) {
               return DataTables::of($get_tenants)
                    ->addIndexColumn()
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
                    // ->addColumn('tenant_portal_status', function ($row) {
                    //     return '
                    //     <ul class="tenant-status">
                    //                                     <li class="active-green first"><i class="fas fa-at"></i></li>
                    //                                     <li class="active-green"><i class="far fa-sign-out"></i></li>
                    //                                     <li><i class="fas fa-paper-plane"></i></li>
                    //                                     <li class="last"><i class="fas fa-dollar-sign"></i></li>
                    //                                 </ul>
                    //     ';
                    // })
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
                    ->rawColumns(['tenant', 'contact_Info', 'balance', 'action'])
                    ->make(true);
          }

          // dd($user_count); 
          $get_properties = Property::where('user_id', auth()->user()->id)->get();
          $totalDueBalance = 0;

          // foreach ($get_properties as $get_property) {
          // $get_units = Unit::where('property_id', $get_property->id)->get();
          //     foreach ($get_units as $get_unit) {
          $dueBalance = MonthlyRent::where('payment_status', 'Unpaid')->sum('amount');
          $totalDueBalance += $dueBalance;
          // }
          // }

          // dd($totalDueBalance);
          return view('tenants', get_defined_vars());
     }

     public function add_tenants()
     {
          $get_properties = Property::where('status', 0)->where('user_id', auth()->user()->id)->get();
          return view('create_tenants', get_defined_vars());
     }

     public function get_units($id)
     {
          $get_units = Unit::where('property_id', $id)->get();
          // dd($get_units, $id);
          return response()->json([
               'message' => 200,
               'data' => $get_units
          ]);
     }

     public function create_tenants(Request $request)
     {
          // dd($request->all());
          if ($request->hasFile('image')) {
               $attechments = $request->file('image');
               $thumb = time() . $attechments->getClientOriginalName();
               $attechments->move(public_path('tenants_image/'), $thumb);
          }
          $unit_details = Unit::findorfail($request->units);
          $tenants = new Tenant;
          $tenants->tenant_added_by = auth()->user()->id;
          $tenants->unit_id = $request->units;
          $tenants->property_id = $request->property_id;
          $tenants->first_name = $request->first_name;
          $tenants->last_name = $request->last_name;
          $tenants->image = $thumb;
          $tenants->email = $request->email;
          $tenants->phone_number = $request->phone_number;
          $tenants->date_of_birth = $request->date_of_birth;
          $tenants->lease_start_date = $request->lease_start_date;
          $tenants->lease_end_date = $request->lease_end_date;
          $tenants->save();

          $unit_owner = PropertyOwner::where('property_id', $request->property_id)
               ->where('unit_id', $request->units)
               ->first();

          $lease = new Lease;
          $lease->user_id = auth()->user()->id;
          $lease->owner_id = $unit_owner->owner_id;
          $lease->unit_id = $request->units;
          $lease->tenant_id = $tenants->id;
          $lease->start_date = $request->lease_start_date;
          $lease->end_date = $request->lease_end_date;
          $lease->rent_amount = $unit_details->property_rent_amount;
          $lease->save();
          return redirect()->route('tenants')->with('success', 'Tenant created successfuly');
     }

     public function edit_tenants($tenant_id)
     {
          $get_properties = Property::where('user_id', auth()->user()->id)->get();
          $get_tenant = Tenant::where('tenant_added_by', auth()->user()->id)->where('is_deleted', 0)->where('id', $tenant_id)->first();
          // $get_units = Unit::where('user_id',$get_tenant->unit_id)->first();
          return view('edit_tenants', get_defined_vars());
     }

     public function update_tenants(Request $request, $id)
     {
          // dd($request->all());
          if ($request->hasFile('image')) {
               $attechments = $request->file('image');
               $thumb = time() . $attechments->getClientOriginalName();
               $attechments->move(public_path('tenants_image/'), $thumb);
          } else {
               $get_tenant = Tenant::where('id', $id)->first();
               $thumb = $get_tenant->image;
          }

          Tenant::where('id', $id)->update(array(
               'tenant_added_by' => auth()->user()->id,
               'unit_id' => $request->units,
               'first_name' => $request->first_name,
               'last_name' => $request->last_name,
               'image' => $thumb,
               'email' => $request->email,
               'phone_number' => $request->phone_number,
               'date_of_birth' => $request->date_of_birth,
               'lease_start_date' => $request->lease_start_date,
               'lease_end_date' => $request->lease_end_date,
          ));

          $unit_details = Unit::findorfail($request->units);

          Lease::where('tenant_id', $id)->where('unit_id', $request->units)->update(array(
               'start_date' => $request->lease_start_date,
               'end_date' => $request->lease_end_date,
               'rent_amount' => $unit_details->property_rent_amount,
          ));
          return redirect()->route('tenants')->with('success', 'Tenant has been updated.');
     }

     public function delete_tenant(Request $request, $id)
     {
          $tenant = Tenant::where('id', $id)->first();
          $unit_details = Unit::find($tenant->unit_id);

          Tenant::where('id', $id)->update(array(
               'is_deleted' => 1
          ));

          // $lease = Lease::where('tenant_id', $id)
          Lease::where('tenant_id', $id)->where('unit_id', $unit_details->id)->update(array(
               'lease_status' => 'inactive',
          ));

          return response()->json([
               'message' => 200,
          ]);
     }

     public function create_rent()
     {
          $get_properties = Property::where('status', 0)->where('user_id', auth()->user()->id)->get();
          $tenants = Tenant::where('is_deleted', 0)->get();
          $unit = Unit::where('status', 0)->get();
          return view('create_rent', get_defined_vars());
     }

     public function store_payment(Request $request)
     {
          // dd($request->all());
          $rent = new MonthlyRent;
          $rent->tenant_id = $request->tenants;
          $rent->unit_id = $request->unit;
          $rent->month_year = $request->month_year;
          $rent->payment_date = $request->month_year;
          $rent->payment_status = $request->payment_status;
          $rent->amount = $request->amount;
          $rent->save();
          return redirect()->route('tenants')->with('success', 'Rent has been added.');
     }

     public function payment_history(Request $request, $tenant_id)
     {
          $monthly_rent = MonthlyRent::where('tenant_id', $tenant_id)->get();
          // dd($monthly_rent);
          if ($request->ajax()) {
               return DataTables::of($monthly_rent)
                    ->addIndexColumn()
                    ->addColumn('tenant', function ($row) {
                         return '
                    <div class="content">
                        <div class="icon">
                            <img src="' . asset('tenants_image/' . $row->tenant->image . ' ') . '" alt="">
                        </div>
                        <div class="txt">
                            <h6>' . $row->tenant->first_name . '</h6>
                                <p>' . $row->Unit->Property->property_name . ' | ' . $row->Unit->unit_name . '</p>
                        </div>
                    </div>';
                    })

                    ->addColumn('property_details', function ($row) {
                         return '<div class="content">
                        <div class="txt">
                            <h6>' . $row->Unit->Property->property_name . '</h6>
                                <p>' . $row->Unit->unit_name . '</p>
                        </div>
                    </div>';
                    })

                    ->addColumn('rent_of_month', function ($row) {
                         return '<div class="content">
                                   <div class="txt"> 
                                        <p>' . $row->month_year . '</p>
                                   </div>
                                   </div>';
                    })

                    ->addColumn('payment_date', function ($row) {
                         return '<div class="content">
                              <div class="txt"> 
                                   <p>' . $row->payment_date . '</p>
                              </div>
                            </div>';
                    })

                    ->addColumn('amount', function ($row) {
                         return '<div class="content">
                                   <div class="txt"> 
                                        <p>FCFA ' . $row->amount . '</p>
                                   </div>
                                 </div>';
                    })

                    ->addColumn('payment_status', function ($row) {
                         if ($row->payment_status == 'Paid') {
                              $status = ' <span class="current">Paid</span>';
                         } else {
                              $status = ' <span class="past">Unpaid</span>';
                         }
                         return '<div class="content">
                        <div class="txt"> 
                                <p>' . $status . '</p>
                        </div>
                    </div>';
                    })

                    ->rawColumns(['tenant', 'property_details', 'payment_status', 'payment_date', 'rent_of_month', 'amount'])
                    ->make(true);
          }
          return view('payment_history', get_defined_vars());
     }
}
