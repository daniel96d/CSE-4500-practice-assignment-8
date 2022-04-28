<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Note;
use App\Models\Equipment;

class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create()
    // {
    //     $myid = request('myid');
    //     return view('note.create', compact('myid'));
    // }

    public function create(Equipment $equipment)
    {
        $myid = request('myid');
        return view('note.create', compact(['equipment','myid']));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

      $validated = $request->validate([
           'comments' => 'required',
           'date' => 'required'
      ]);

      $note = Note::create([
           'comments' => $request->comments,
           'date' => $request->date,
           'equipment_id' => $request->equipment_id
      ]);

      $equipments = Equipment::sortable()->paginate(5);
      return view('equipment',compact('equipments'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Note $note)
    {
        return view('note.edit', compact('note'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Note $note)
    {
        $request->validate([
          'comments' => 'required',
          'date' => 'required'
        ]);

        $note->update($request->all());
        $myid = $note->equipment_id;
        $equipment = Equipment::findorfail($myid);
        return redirect()->route('equipment.show', compact('equipment'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Note $note)
    {
        $myid = $note->equipment_id; //This will retrieve the equipment id from the URL
        $note->delete();
        $equipment = Equipment::findorfail($myid);
        //echo $equipment;
        //return view('/equipment/{{$myid}}');
        //$equipments = Equipment::paginate(5);
        return view('equipment.show',compact('equipment'));
    }
}
