<?php

namespace App\Http\Controllers;

use App\Models\city;
use App\Models\Country;
use App\Models\State;
use App\Models\Zonal;
use Illuminate\Http\Request;


class ZonalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function getZones()
    {


        return view('admin.zones.zone');
    }

    public function getzonesData()
    {

        $zones =  Zonal::orderBy('id', 'desc')->get();

        return response()->json(["data" => $zones]);
    }


    public function getCities(Request $request)
    {
        $stateCode = $request->input('state_code');

        $cities = City::where('code_state', $stateCode)->get();

        // $cities = City::whereHas('state', function ($query) use ($stateCode) {
        //     $query->where('code', $stateCode);
        // })->get();

        return response()->json($cities);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $country = Country::get();
        $states = State::all();
        $cities = City::take(10)->get();

        return view('admin.zones.addzone', compact('states', 'country', 'cities'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate(
            [
                'zone' => ['required', 'unique:zonals,zone'],
                'postal' => ['unique:zonals,postal'],
                'city_id' => ['required']
            ],

            [
                'zone.required' => "Please provide zone name",
            ]
        );

        Zonal::create([

            'route_type' => $request->route_type,
            'zone' => $request->zone,
            'state_code' => $request->state_code,
            'city_id' => $request->city_id,
            'postal' => $request->postal,
            'country_id' => 239,

        ]);

        return redirect()->route('admin.zones')->with('success', 'Zone added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Zonal $zonal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function editZone($id)
    {
        $zone = Zonal::findOrfail($id);
        $country = Country::get();
        $city = city::get();
        $states = State::all();

        return view('admin.zones.editzone', compact('zone', 'country', 'city', 'states'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateZone(Request $request, $id)
    {
        $request->validate([
            'zone' => ['required'],
            'city_id' => ['required']
        ], [
            'zone.required' => "Please provide zone name",
        ]);

        Zonal::where('id', $id)->update([
            'route_type' => $request->route_type,
            'zone' => $request->zone,
            'country_id' => 239,
            'city_id' => $request->city_id,
            'postal' => $request->postal,
        ]);

        return redirect()->route('admin.zones')->with('success', 'Zone updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function deleleteZone($id)
    {
        if (!$id) {
            abort(404);
        }

        Zonal::where('id', $id)->delete();

        return back()->with('success', 'Zone deleted successfully.');
    }
}
