<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Fare;
use App\Models\Zonal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FareController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function getfares()
    {

        return view('admin.fares.fare');
    }

    public function getfaresData()
    {
        $fares = Fare::with('car')
            ->with('from')
            ->with('to')
            ->orderBy('id', 'desc')
            ->get();

        // foreach ($fares as $fare) {
        //     if ($fare->car) {
        //         \Log::info('Car name: ' . $fare->car->car_name);
        //     }
        // }

        return response()->json(['data' => $fares]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cars = Car::get();
        $zones = Zonal::all();

        return view('admin.fares.addfare', ['cars' => $cars, 'zones' => $zones]);
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'zone_from' => ['required'],
            'car_name' => ['required', function ($attribute, $value, $fail) use ($request) {
                $exists = Fare::where('car_id', $value)
                    ->where('zone_from', $request->zone_from)
                    ->where('zone_to', $request->zone_to)
                    ->exists();

                if ($exists) {
                    $fail('The Car Name, Zone From, and Zone To already exists.');
                }
            }],
            'fare' => ['required', 'numeric'],
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        Fare::create([
            'car_id' => $request['car_name'],
            'zone_from' => $request['zone_from'],
            'zone_to' => $request['zone_to'],
            'fare' => $request['fare']
        ]);

        return redirect()->route('admin.fares')->with('success', 'Fare added successfully');
    }


    /**
     * Display the specified resource.
     */
    public function show(Fare $fare)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function editfare($id)
    {
        $fares = Fare::findOrFail($id);
        $cars = Car::all();
        $zones = Zonal::all();


        return view('admin.fares.editfare', compact('fares', 'cars', 'zones'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function updatefare(Request $request, $id)
    {
        $request->validate([
            'zone_from' => ['required'],
            'zone_to' =>  ['required'],
            'car_name' => ['required'],
            'fare' => ['required', 'numeric'],
        ]);

        Fare::where('id', $id)->update([
            'car_id' => $request['car_name'],
            'zone_from' => $request['zone_from'],
            'zone_to' => $request['zone_to'],
            'fare' => $request['fare']
        ]);

        return redirect()->route('admin.fares')->with('success', 'Fare updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function deleletefare($id)
    {
        if (!$id) {
            abort(404);
        }
        Fare::where('id', $id)->delete();

        return back()->with('success', 'Fare deleted successfully.');
    }
}
