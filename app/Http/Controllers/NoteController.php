<?php

namespace App\Http\Controllers;

use App\Models\Notes;
use Illuminate\Http\Request;

class NoteController extends Controller
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

    public function index(Request $request){
        $notes = Notes::where('user_id', auth()->user()->id)->get();
        return view('notes',get_defined_vars());
    }

    public function create_notes(Request $request){
        return view('add_note');
    }

    public function store_notes(Request $request){
        $validatedData = $request->validate([
            'title' =>'required|string|max:255',
            'content' =>'required|string|max:255',
        ]);

        Notes::create([
            'title' => $request->title,
            'content' => $request->content,
            'user_id' => auth()->user()->id,
        ]);

        return redirect()->route('notes')->with('success', 'Notes has been created');
    }
    public function edit_notes($id){
        $notes = Notes::where('id', $id)->first();
        return view('edit_note',get_defined_vars());
    }

    public function update_notes(Request $request, $id){}

    public function delete_notes(Request $request, $id){
        Notes::where('id', $id)->delete();
        return redirect()->route('notes')->with('success', 'Notes has been deleted');
    }
}
