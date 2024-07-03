<?php

namespace App\Http\Controllers;

use App\Mail\TaskNotificationToAssignees;
use App\Models\Property;
use App\Models\Task;
use App\Models\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Yajra\DataTables\Facades\DataTables;

class TaskMaintenance extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function task_maintenance(Request $request)
    {
        $tasks = Task::all();
        if ($request->ajax()) {
            return DataTables::of($tasks)
                ->addColumn('task', function ($row) {
                    $owner = ' 
                    <a href="' . route('task_details', $row->id) . '">
                        <div class="content"> 
                            <div class="txt">
                                <h6>' . $row->subject . '</h6> <br> 
                            </div>
                        </div>
                    </a>';
                    // dd($owner);
                    return $owner;
                    // | '. $row->Owners->Unit->unit_name. 
                })
                ->addColumn('assigned_to', function ($row) {
                    $tenant = ' 
                        <div class="content"> 
                            <div class="txt"> 
                                <p>' . $row->assignees . '</p>
                            </div>
                        </div>';
                    // dd($owner);
                    return $tenant;
                    // | '. $row->Owners->Unit->unit_name.
                })

                ->addColumn('priority', function ($row) {
                    // dd($owner);
                    return $row->priority;
                    // | '. $row->Owners->Unit->unit_name. 
                })

                ->addColumn('related_to', function ($row) {
                    $related_to = ' 
                        <div class="content"> 
                            <div class="txt">
                                <h6>' . $row->Property->property_name . '</h6> <br>
                                <p>' . $row->Property->address . '</p>
                            </div>
                        </div>';
                    // dd($owner);
                    return $related_to;
                    // | '. $row->Owners->Unit->unit_name. 
                })

                ->addColumn('status', function ($row) {
                    // dd($owner);
                    return $row->status;
                    // | '. $row->Owners->Unit->unit_name. 
                })
                ->addColumn('action', function ($row) {
                    // dd($owner);
                    return '<a href="' . route('edit_task_maintenance', $row->id) . '" class="btn btn-primary">Edit</a> ';
                    // | '. $row->Owners->Unit->unit_name. 
                })

                ->rawColumns(['task', 'assigned_to', 'priority', 'related_to', 'status', 'action'])
                ->make(true);
        }
        return view('tasks', get_defined_vars());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $proerties = Property::where('user_id', auth()->user()->id)->where('status', 0)->get();

        return view('task_create', get_defined_vars());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $task = Task::create($request->all());

        try {
            if ($request->notify_assignees == "on" && $request->assignees != null) {
                $details = Task::where('id', $task->id)->first();
                foreach (explode(',', $request->assignees) as $emails) {
                    Mail::to($emails)->send(new TaskNotificationToAssignees($details));
                }
            }
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }

        return redirect()->route('task_maintenance')->with('success', 'Task stored successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Task $task
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $task = Task::findorfail($id);
        // dd($task);
        return view('task_show', compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Task $task
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $task = Task::findorfail($id);
        $property = Property::where('id', $task->related_to)->first();
        $properties = Property::where('status', 0)->get();

        $unit = Unit::where('id', $task->unit)->first();
        return view('task_edit', get_defined_vars());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Models\Task $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {
        $task->update($request->all());

        return back()->with('success', 'Task updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Task $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        $task->delete();

        return back()->with('success', 'item deleted successfully');
    }
}
