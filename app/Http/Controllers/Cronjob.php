<?php

namespace App\Http\Controllers;

use App\Models\MonthlyRent;
use App\Models\Tenant;
use App\Models\Unit;
use Carbon\Carbon;
use Illuminate\Http\Request;

class Cronjob extends Controller
{
    //

    public function makeLogForUnpaidRent()
    {
        $monthly_rents = MonthlyRent::where('month_year','!=', Carbon::now()->format('Y-m-d'))->get();
        if ($monthly_rents->count() < 1) {
            $get_tenants = Tenant::where('is_deleted', 0)->get();
            foreach($get_tenants as $get_tenants){
                    $get_unit_details = Unit::where('id', $get_tenants->unit_id)->first();
                $monthly_rents = new MonthlyRent;
                $monthly_rents->tenant_id = $get_tenants->id;
                $monthly_rents->unit_id = $get_tenants->unit_id;
                $monthly_rents->month_year = carbon::now()->format('Y-m-d');
                $monthly_rents->amount = $get_unit_details->property_rent_amount;
                $monthly_rents->payment_date = carbon::now()->format('Y-m-d');
                $monthly_rents->payment_status = 'Unpaid';
                $monthly_rents->save();
                 
            }
        }
    }
}
