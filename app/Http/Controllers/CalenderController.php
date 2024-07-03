<?php

namespace App\Http\Controllers;

use App\Models\Lease;
use App\Models\Task;
use Illuminate\Http\Request;

class CalenderController extends Controller
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
        $tasks = Task::all();
        $lease = Lease::where('user_id',auth()->user()->id)->get();
        return view('calender',get_defined_vars());
    }
}
