<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Equipment;
use Kyslik\ColumnSortable;
use Kyslik\ColumnSortable\Sortable;

class EquipmentController extends Controller
{

    public function index()
    {
        $equipments = Equipment::sortable()->paginate(5);
        return view('equipment',compact('equipments'));
    }


    public function create()
    {
        return view('equipment.create');
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
             'category' => 'required',
             'hardwareSpecs' => 'required',
             'user' => 'required',
             'userContact' => 'required',
             'manufacturerName' => 'required',
             'manufacturerSaleContact' => 'required',
             'manufacturerTechContact'  => 'required',
             'purchaseDate'  => 'required',
             'price' => 'required',
             'invoice' => 'required',

        ]);

        Equipment::create($request->all());
        // $equipments = Equipment::create([
        //      'category' => $request->category,
        //      'hardwareSpecs' => $request->hardwareSpecs,
        //      'user' => $request->user,
        //      'userContact' => $request->userContact,
        //      'manufacturerName' => $request->manufacturerName,
        //      'manufacturerSaleContact' => $request->manufacturerSaleContact,
        //      'manufacturerTechContact'  => $request->manufacturerTechContact,
        //      'purchaseDate'  => $request->purchaseDate,
        //      'price' => $request->price,
        //      'invoice' => $request->invoice,
        // ]);

        return $this->index();
    }

    public function show(Equipment $equipment)
    {
        return view('equipment.show',compact('equipment'));
    }

    public function edit(Equipment $equipment)
    {
      return view('equipment.edit', compact('equipment'));
    }


    public function update(Request $request, Equipment $equipment)
    {
      $request->validate([
        'category' => 'required',
        'hardwareSpecs' => 'required',
        'user' => 'required',
        'userContact' => 'required',
        'manufacturerName' => 'required',
        'manufacturerSaleContact' => 'required',
        'manufacturerTechContact'  => 'required',
        'purchaseDate'  => 'required',
        'price' => 'required',
        'invoice' => 'required'
      ]);

      //Equipment::update($request->all());
      $equipment->update($request->all());
      return redirect()->route('equipment.index');
    }


    public function destroy(Equipment $equipment)
    {
      $equipment->delete();
      //return view('/equipment/{{$myid}}');
      $equipments = Equipment::sortable()->paginate(5);
      return view('equipment',compact('equipments'));
    }
}
