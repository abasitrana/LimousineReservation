<?php

namespace App\Http\Controllers;

use App\Models\hourly_slab;
use Illuminate\Http\Request;

class HourlySlabController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function hourlySlab()
    {

        return view('admin.hourly_slabs.hourlyslabs');
    }

    public function  getHourlySlabs(Request $request)
    {
        //   return $request->all();
        $hourlySlabs = hourly_slab::orderBy('id', 'DESC')->get();

        return response()->json(["data" => $hourlySlabs,  200]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function addHourlySlab()
    {
        return view("admin.hourly_slabs.addhourlyslabs");
    }

    
    /**
     * Store a newly created resource in storage.
     */
    public function addHourlySlabData(Request $request)
    {
        $request->validate([

            "hourly_slabs" => ["required"],
            "slabs_price" => ["required", "regex:/^\d+(\.\d{1,2})?$/"],
        ]);

        hourly_slab::create([
            "slabs" => $request->hourly_slabs,
            "slabs_price" => $request->slabs_price,
        ]);

        return back()->with("success", "Hourly Slab added successfully!");
    }

    /**
     * Display the specified resource.
     */
    public function show(hourly_slab $hourly_slab)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edithourlyslab(hourly_slab $hourly_slab, $id)
    {
        $hourly_slab = hourly_slab::where("id", $id)->first();

        return view("admin.hourly_slabs.edithourlyslabs", compact("hourly_slab"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateHourlySlab(Request $request, hourly_slab $hourly_slab)
    {

        try {
            $hourly_slab = hourly_slab::findOrFail($request->id);

            $request->validate([

                "hourly_slabs" => ["required"],
                "slabs_price" => ["required", "regex:/^\d+(\.\d{1,2})?$/"],
            ]);



            $hourly_slab->update([
                "slabs" => $request->hourly_slabs,
                "slabs_price" => $request->slabs_price,

            ]);
        } catch (\Exception $ex) {
            return back()->withErrors($ex->getMessage());
        }

        return redirect()->back()->with("success", "Hourly Slab updated successfully!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function deleteHourlySlab(hourly_slab $hourly_slab,  $id)
    {

            $hourly_slab::destroy($id);

        return redirect()->back()->with(['success' => 'Record deleted Successfully'], 200);

    }
}
