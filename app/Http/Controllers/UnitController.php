<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use Illuminate\Http\Request;

class UnitController extends Controller
{
    public function index(){
        return view('admin.unit.index');
    }

    public function create(Request $request){
        $validatedData = $request->validate([
            'name'          => ['required'],
            'description'   => ['required'],
            'status'        => ['required'],
        ], [
            'name.required'        => 'Name is required',
            'description.required' => 'Description is required',
            'status.required'      => 'Status is required',
        ]);
        


        $unit = new Unit();

        $unit->name         = $request->name;
        $unit->description  = $request->description;
        $unit->status       = $request->status;
        $unit->save();

        return redirect()->route('unit.manage')->with('message','Unit Added Successfull');
    }

    public function manage(){
        $units = Unit::all();

        return view('admin.unit.manage',compact('units'));
    }

    public function edit($id){
        $data = Unit::find($id);

        return view('admin.unit.edit',compact('data'));
    }

    public function update(Request $request,$id){
         $data = Unit::find($id);

         $data->name = $request->name;
         $data->description = $request->description;
         $data->status = $request->status;

         $data->save();

         return redirect()->route('unit.manage')->with('message','unit update successfull');
    }

    public function delete($id){
        $data = Unit::find($id);

        $data->delete();

        return redirect()->route('unit.manage')->with('message','unit delete successfull');
    }
}
