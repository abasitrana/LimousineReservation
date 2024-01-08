<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fleet;

class FleetController extends Controller
{
    //
    public function createFleet(){
        return view('');
    }
    public function fleetDashboard(){
        return view('admin.fleet.fleet');
    }
    public function addFleet(){
        return view('admin.fleet.add');
    }
    public function addFleetData(Request $request){
        $fleet = new Fleet();
        $fleet->car_name = $request->car_name;
        $fleet->car_make = $request->car_make;
        $fleet->car_model = $request->car_model;
        $fleet->car_description =$request->car_description;
        $fleet->max_capacity_person = $request->max_capacity_person;
        $fleet->max_capacity_luggage = $request->max_capacity_luggage;
        
        //File Upload Mechanism
        $file = $request->file('car_picture');
        $timestamp = now()->timestamp;

        $path = $file->storeAs('uploads', $timestamp . '_' . $file->getClientOriginalName());
        $fleet->car_picture =$path;
        $fleet->save();
        return view('admin.fleet.fleet');

    }
    public function getFleets(){
        $fleets = Fleet::get();
        return response()->json(['data'=>$fleets]);
    }
    public function editFleet($id){
        $fleet = Fleet::find($id);
        return view('admin.fleet.edit')->with($fleet);
    }
}
