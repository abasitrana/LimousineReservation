<?php

namespace App\Http\Controllers;

use App\Mail\ContactFormEmail;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Mail\Message;
use App\Models\ContactUsQueries;
use App\Models\Car;
use App\Models\Fare;
use App\Models\HourlyPackage;
use App\Models\HourlyPackageSlab;
use App\Models\HourlySlap;
use App\Models\User;
use App\Models\Zonal;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;

class WebsiteController extends Controller
{

    public function index()
    {

        $zones = Zonal::all();
        $cars = Car::with('car_pictures')->get();
        $HourlyPackage = HourlyPackage::get();
        // dd($cars[0]);
        return view('index', ['cars' => $cars, 'zones' => $zones, 'HourlyPackage' => $HourlyPackage]);
    }


    public function getFarePrice(Request $request)
    {
        $zone_from = $request->input('zone_from');
        $zone_to = $request->input('zone_to');

        $fare = Fare::with('from', 'to')
            ->whereHas('from', function ($query) use ($zone_from) {
                $query->where('zone', $zone_from);
            })
            ->whereHas('to', function ($query) use ($zone_to) {
                $query->where('zone', $zone_to);
            })
            ->select('id', 'fare')
            ->first();

        if ($fare) {
            $fare = $fare->toArray();
            return response()->json(['fare_price' => $fare['fare'], 'fare_id' => $fare['id']], 200);
        }

        return response()->json(['fare_price' => null, 'fare_id' => null], 200);
    }


    public function getSlapsPrice(Request $request)
    {

        $hourlyPrice = HourlyPackageSlab::where("hourly_package_id", $request->pckgid)->get();

        return response()->json(["hourlyPrice" => $hourlyPrice], 200);
    }


    public function aboutUs()
    {
        return view('aboutus');
    }


    public function getRouteType(Request $request)
    {
        if ($request->data == 2) {
            return response()->json(["zonals" => [], 'routes' => []], 200);
        }
        $zonals = Zonal::select('postal')->where("route_type", $request->data)->get();
        $routes = Fare::with('from')->with('to')->get();
        $desiredRoutes = [];
        if ($routes) {
            for ($i = 0; $i < count($routes); $i++) {

                $desiredRoutes[] = [
                    'from' => $routes[$i]->from->postal,
                    'to' => $routes[$i]->to->postal,
                ];
            }
        }
        $postals = collect($zonals)->pluck('postal');
        return response()->json(["zonals" => $postals, 'routes' => $desiredRoutes], 200);
    }
    public function test(Request $request)
    {
        $zonals = Zonal::select('postal')->where("route_type", 1)->get();
        // dd(array_values(...$zonals->toArray()));
        //         Array:17 [▼ // app\Http\Controllers\WebsiteController.php:85
        //   0 => array:1 [▼
        //     "postal" => "23928"
        //   ]
        //   1 => array:1 [▼
        //     "postal" => "25262"
        //   ]
        // get only values in the nested array
        // collection function ?
        // $values = $zonals->pluck('postal');
        // dd($values->toArray());
        $routes = Fare::with('from')->with('to')->get();
        $desiredRoutes = [];
        if ($routes) {
            for ($i = 0; $i < count($routes); $i++) {

                $desiredRoutes[] = [
                    'from' => $routes[$i]->from->postal,
                    'to' => $routes[$i]->to->postal,
                ];
            }
        }
        dd($desiredRoutes);
    }

    public function booking(Request $request)
    {
        if (!(session('bookingData'))) {
            return redirect()->route('home');
        }
        $zones = Zonal::all();
        $bookingData = session('bookingData');

        // dd($bookingData);
        $cars = Car::where('max_capacity', '>=', $bookingData['max_persons'])->where('max_luggage', '>=', $bookingData['max_luggage'])->get();
        $HourlyPackage = HourlyPackage::where('id', $bookingData['hourly_package_id'])->first();

        // dd($HourlyPackage);
        return view('booking', ['bookingData' => $bookingData, 'cars' => $cars, 'HourlyPackage' => $HourlyPackage, 'zones' => $zones]);
    }

    public function contactUs()
    {
        return view('contactus');
    }
    public function services()
    {
        return view('services');
    }

    public function contactUsForm(Request $request)
    {
        $reciever_email_address = "k.maaz.ali@gmail.com";
        Mail::to($reciever_email_address)->send(new ContactFormEmail($request->name, $request->message, $request->email));
        $query = new ContactUsQueries([
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message
        ]);

        $query->save();
        return view('contactus')->with('notification', [
            'type' => 'success',
            'message' => 'Your Query Submitted Successfully',
        ]);
    }


    public function bookingSession(Request $request)
    {
        $data = $request->all();
        if ($request->hourly_package_id == 'zonal') {
            $data['hourly_package_id'] = 0;
            $data['route_type'] = 1;
        } else {
            $data['route_type'] = 2;
        }
        session(['bookingData' => $data]);
        return to_route('booking');
    }

    public function createBooking(Request $request)
    {

        $request->validate([
            'car' => 'required',
        ]);
        try {
            $car = Car::where('id', $request->car)->where('max_capacity', $request->person_count)->where('max_luggage', $request->luggage_count)->first();
            if (!$car) {
                return redirect('booking', 404)->back()->with(['error' => 'No car found']);
            }

            DB::transaction(function () use ($request) {

                if ($request->route_type == 1) {
                    $fareId = $request->input('fare_id');


                    $bookingData = session('bookingData');

                    $booking = new Booking();
                    $booking->car_id = $request->car;
                    $booking->fare_id = $request->fare_id;
                    $booking->datepicker = $request->datepicker;
                    $booking->timepicker = $request->timepicker;

                    $booking->route_type = $request->route_type;
                    $booking->from_address = $request->from_address;
                    $booking->to_address = $request->to_address;
                    $booking->from_address_zipcode = $request->from_address_zipcode;
                    $booking->to_address_zipcode = $request->to_address_zipcode;
                    $booking->from_address_lat = $request->from_address_lat;
                    $booking->from_address_lng = $request->from_address_lng;
                    $booking->to_address_lat = $request->to_address_lat;
                    $booking->to_address_lng = $request->to_address_lng;
                    $booking->total_price = $request->total_price;
                    $booking->luggage_count = $request->luggage_count;
                    $booking->person_count = $request->person_count;
                    $bookingResult = $booking->save();
                } else {
                    $booking = new Booking();
                    $booking->car_id = $request->car;
                    $booking->fare_id = $request->fare_id;
                    $booking->datepicker = $request->datepicker;
                    $booking->timepicker = $request->timepicker;
                    $booking->hourly_package_id = $request->hourly_package_id;
                    // $booking->hourly_slaps_id = $request->hourly_slaps_price_id;
                    // $booking->booking_date_from = $fareFromTo->zone_from;
                    // $booking->booking_date_to = $fareFromTo->zone_to;
                    $booking->route_type = $request->route_type;
                    $booking->from_address = $request->from_address;
                    $booking->to_address = $request->to_address;
                    $booking->from_address_zipcode = $request->from_address_zipcode;
                    $booking->to_address_zipcode = $request->to_address_zipcode;
                    $booking->from_address_lat = $request->from_address_lat;
                    $booking->from_address_lng = $request->from_address_lng;
                    $booking->to_address_lat = $request->to_address_lat;
                    $booking->to_address_lng = $request->to_address_lng;
                    $booking->total_price = $request->total_price;
                    $booking->luggage_count = $request->luggage_count;
                    $booking->person_count = $request->person_count;
                    $bookingResult = $booking->save();
                }



                $user = new User();
                $user->name = $request->first_name . " " . $request->last_name;
                $user->email = $request->email;
                $user->password = bcrypt('test123');
                $user->role_id = 2;
                $userResult = $user->save();

                if ($bookingResult == true && $userResult == true) {
                    Session()->flash('message', 'Data Saved Successful.!!');
                    Session()->flash('alert-class', 'alert-success');
                    session()->forget('bookingData');
                } else {

                    Session()->flash('message', 'Error Occured.!!');
                    Session()->flash('alert-class', 'alert-danger');
                }
            });
        } catch (QueryException $e) {
            if ($e->errorInfo[1] == 1062) {
                return redirect()->back()->with('error', 'The email address is already registered.');
            } else {
                dd($e);
                return redirect()->back()->with('error', 'An unexpected error occurred.');
            }
        }


        return to_route('booking');
    }




    public function getZonalFareApi()
    {
        // get only zone from and to and fare price
        $zones = Fare::with(['from', 'to'])->get();

        $results = $zones->map(function ($zone) {
            return [
                'from' => $zone->from->postal,
                'to' => $zone->to->postal,
            ];
        });


        return response()->json($results);
    }
}
