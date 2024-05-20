<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Car;
use App\Models\CarCategories;
use App\Models\CarPicture;
use App\Models\HourlyPackage;
use App\Models\HourlyPackageSlab;
use App\Models\HourlySlap;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class CarsController extends Controller
{
    public function getCars()
    {
        return view('admin.cars.cars');
    }
    public function getCarsData()
    {
        $cars = Car::with('car_category')->get();
        return response()->json(['data' => $cars]);
    }
    public function addCars(Request $request)
    {
        $car = new Car();
        $car->car_name = $request->car_name;
        $car->car_registration_number = $request->car_registration_number;
        $car->car_description = $request->car_description;
        $car->car_category_id = $request->car_category_id;
        $car->car_base_fare = $request->car_base_fare;
        $car->max_capacity = $request->max_capacity;
        $car->max_luggage = $request->max_luggage;
        $car->save();


        $files = [];
        if ($request->file('files')) {
            foreach ($request->file('files') as $key => $file) {
                $timestamp = now()->timestamp;
                $imageName = $timestamp . '_car.' . $file->extension();
                $path = 'storage/uploads/' . $imageName;

                $file->move(public_path('storage/uploads/'), $imageName);

                $car_picture = new CarPicture();
                $car_picture->car_id = $car->id;
                $car_picture->car_picture_path = $path;
                $car_picture->save();
            }
        }
        return view('admin.cars.cars');
    }
    public function addCarsForm()
    {
        $cars_categories = CarCategories::get();
        return view('admin.cars.addcars')->with(['cars_categories' => $cars_categories]);
    }

    public function editCars($id)
    {
        $car = Car::where('id', $id)->first();
        $car_categories = CarCategories::get();

        return view('admin.cars.editcars')->with(['car' => $car])->with(['car_categories' => $car_categories]);
    }
    public function editCar(Request $request, $id)
    {
        $car = Car::find($id);
        $car->car_name = $request->car_name;
        $car->car_registration_number = $request->car_registration_number;
        $car->car_description = $request->car_description;
        $car->car_category_id = $request->car_category_id;
        $car->car_base_fare = $request->car_base_fare;
        $car->max_capacity = $request->max_capacity;
        $car->max_luggage = $request->max_luggage;
        $car->save();

        $files = [];
        if ($request->file('files')) {
            foreach ($request->file('files') as $key => $file) {
                $timestamp = now()->timestamp;
                $imageName = $timestamp . '_car.' . $file->extension();
                $path = 'storage/uploads/' . $imageName;
                $file->move(public_path('storage/uploads/'), $imageName);
                $car_picture = new CarPicture();
                $car_picture->car_id = $car->id;
                $car_picture->car_picture_path = $path;
                $car_picture->save();
            }
        }
        return redirect()->route('admin.cars')->with('message', 'Car Updated successfully.');
    }

    public function deleteCar($id)
    {
        Car::where('id', $id)->delete();
        return redirect()->route('admin.cars')->with('success', 'Car deleted successfully.');
    }



    public function hourlyData()
    {

        $hourly = HourlyPackage::with('car')->get();

        return response()->json(['data' => $hourly]);
    }
    public function addHourly()
    {
        $cars = Car::get();
        return view('admin.hourly.addhourly')->with(['cars' => $cars]);
    }


    public function getSlabsData(Request $request)
    {

        parse_str($request->data, $slabsData);

        session()->put('hourlySlabsData', $slabsData);


        return response()->json(["message" => "Extra Hourly Slabs added, kindly you need to submit the form above to save Data!"]);
    }

    public function addHourlyData(Request $request)
    {

        if (session()->has('hourlySlabsData')) {
            $hourlySlabsData = session('hourlySlabsData');

            $hourlyPackage = new HourlyPackage();
            $hourlyPackage->package_name = $request->package_name;
            $hourlyPackage->package_description = $request->package_description;
            $hourlyPackage->car_id = $request->car_id;
            $hourlyPackage->default_hours = $request->default_hours;
            $hourlyPackage->hourly_rate = $request->hourly_rate;
            $hourlyPackage->save();

            $hourlyPackageId = $hourlyPackage->id;

            foreach ($hourlySlabsData['hourly_slaps'] as $key => $hourlySlap) {
                HourlyPackageSlab::create([
                    "hourly_package_id" => $hourlyPackageId,
                    "car_id" => $request->car_id,
                    "hourly_slap" => $hourlySlap,
                    "extra_hourly_price" => $hourlySlabsData['extra_hourly_rate'][$key]
                ]);
            }


            session()->forget('hourlySlabsData');

            return redirect()->route('admin.hourly.hourly')->with(["success" => "Hourly package data has been saved successfully!"]);
        } else {

            $hourlyPackage = new HourlyPackage();
            $hourlyPackage->package_name = $request->package_name;
            $hourlyPackage->package_description = $request->package_description;
            $hourlyPackage->car_id = $request->car_id;
            $hourlyPackage->default_hours = $request->default_hours;
            $hourlyPackage->hourly_rate = $request->hourly_rate;
            $hourlyPackage->save();

            return redirect()->route('admin.hourly.hourly')->with(["success" => "Hourly package data has been saved successfully!"]);
        }
    }


    public  function hourly()
    {
        return view('admin.hourly.hourly');
    }


    public function edithourly($id)
    {
        $hourlyPackage = HourlyPackage::findOrFail($id);
        $hourlyPackageSlabs = HourlyPackageSlab::where('hourly_package_id', $id)->get();
        $cars = Car::get();

        return view('admin.hourly.edithourly', compact('hourlyPackage', 'hourlyPackageSlabs', 'cars'));
    }


    public function updateHourly(Request $request)
    {

        $validator = Validator::make($request->all(), [
            "package_name" => "required",
            "package_description" => "required",
            "car_id" => "required|numeric",
            // "extra_hourly_rate" => "required|array",
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->getMessageBag()->toArray()
            ], 400);
        }

        $hourlyPackage = HourlyPackage::findOrFail($request->id);

        $hourlyPackage->update([
            'package_name' => $request->package_name,
            'package_description' => $request->package_description,
            'car_id' => $request->car_id,
            'default_hours' => $request->default_hours,
            'hourly_rate' => $request->hourly_rate
        ]);


        HourlyPackageSlab::where('hourly_package_id', $hourlyPackage->id)->delete();

        $hourlySlabsData = session('hourlySlabsData');

        if ($hourlySlabsData && isset($hourlySlabsData['hourly_slaps'])) {

            foreach ($hourlySlabsData['hourly_slaps'] as $key => $hourlySlap) {
                HourlyPackageSlab::create([
                    "hourly_package_id" => $hourlyPackage->id,
                    "car_id" => $request->car_id,
                    "hourly_slap" => $hourlySlap,
                    "extra_hourly_price" => $hourlySlabsData['extra_hourly_rate'][$key]
                ]);
            }
        }

        session()->forget("hourlySlabsData");


        return redirect()->route('admin.hourly.hourly')->with('message', 'Hourly Package Updated Successfully');
    }


    public function deleteHourly($id)
    {
        if (!$id) {
            abort(404);
        }

        try {
            DB::beginTransaction();

            HourlyPackageSlab::where('hourly_package_id', $id)->delete();

            HourlyPackage::where('id', $id)->delete();

            DB::commit();

            return redirect()->route('admin.hourly.hourly')->with('message', 'Hourly Package and associated slabs deleted successfully');
        } catch (\Exception $e) {
            DB::rollBack();

            return redirect()->route('admin.hourly.hourly')->with('errors', 'An error occurred while deleting hourly package and associated slabs');
        }
    }
}
