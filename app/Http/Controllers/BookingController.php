<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Car;
use App\Models\Fare;
use App\Models\HourlyPackage;
use App\Models\HourlyPackageSlab;
use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class BookingController extends Controller
{
    public function getBookingsData()
    {
        $bookings = Booking::with(['cars', 'hourly_package'])->get();
        return response()->json(['data' => $bookings]);
    }

    public function booking()
    {
        return view('admin.bookings.bookings');
    }

    public function addbooking()
    {
        $cars = Car::get();
        $hourly_package = HourlyPackage::get();
        return view('admin.bookings.addbooking')->with(['cars' => $cars])->with(['hourly_package' => $hourly_package]);
    }

    public function createBooking(Request $request)
    {

        try {

            DB::transaction(function () use ($request) {

                $fareId = $request->input('fare_id');
                $fareFromTo = Fare::where('id', $fareId)->first();

                $bookingData = session('bookingData');

                $booking = new Booking();
                $booking->car_id = $request->car_id;
                $booking->fare_id = $request->fare_id;
                $booking->datepicker = $request->datepicker;
                $booking->timepicker = $request->timepicker;
                $booking->hourly_package_id = $request->hourly_package_id;
                $booking->hourly_slaps_id = $request->hourly_slaps_price_id;
                // $booking->booking_date_from = $fareFromTo->zone_from;
                // $booking->booking_date_to = $fareFromTo->zone_to;
                $booking->booking_date_from = fake()->date;
                $booking->booking_date_to = fake()->date;
                $booking->total_price = $request->total_price;
                $booking->luggage_count = $request->luggage_count;
                $booking->person_count = $request->person_count;
                $bookingResult = $booking->save();

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

    public function checkout(Request $request)
    {

        try {

            $session_url = DB::transaction(function () use ($request) {
                $car = Car::where('id', $request->car_id)->where('max_capacity', '>=', $request->person_count)->where('max_luggage', '>=', $request->luggage_count)->first();

                if (!$car) {
                    return redirect()->back()->with(['error' => 'No suitable car found matching your requirements. Please adjust your criteria and try again.']);
                }
                $hourlyPackage = HourlyPackage::where('id', $request->hourly_package_id)->first();
                $hourlyPackageSlab = HourlyPackageSlab::where('hourly_package_id', $request->hourly_package_id)->first();
                $total_price = 0;

                if ($request->route_type == 1) {
                    $fareId = $request->input('fare_id') ?? 1;
                    $zonalFare = Fare::where('id', $fareId)->first();
                    $total_price += $zonalFare->fare + $car->car_base_fare + $hourlyPackage->hourly_rate;


                    $booking = new Booking();
                    $booking->car_id = $request->car_id;
                    $booking->fare_id = $request->fare_id;
                    $booking->datepicker = $request->datepicker;
                    $booking->timepicker = $request->timepicker;

                    $booking->route_type = $request->route_type;
                    $booking->start_address = $request->start_address ?? 'test';
                    $booking->end_address = $request->end_address ?? 'test';
                    $booking->start_address_zipcode = $request->start_address_zipcode ?? '12121';
                    $booking->end_address_zipcode = $request->end_address_zipcode ?? '21212';
                    $booking->start_address_lat = $request->start_address_lat ?? '57.23';
                    $booking->start_address_lng = $request->start_address_lng ?? '128.24';
                    $booking->end_address_lat = $request->end_address_lat ?? '58.24';
                    $booking->end_address_lng = $request->end_address_lng ?? '128.25';
                    $booking->total_price = $total_price;
                    $booking->luggage_count = $request->luggage_count;
                    $booking->person_count = $request->person_count;
                } else {
                    $total_price += $car->car_base_fare + $hourlyPackage->hourly_rate + $request->extraHourlySlapPrice;

                    $booking = new Booking();
                    $booking->car_id = $request->car_id;
                    $booking->fare_id = $request->fare_id;
                    $booking->datepicker = $request->datepicker;
                    $booking->timepicker = $request->timepicker;
                    $booking->hourly_package_id = $request->hourly_package_id;
                    // $booking->hourly_slaps_id = $request->hourly_slaps_price_id;
                    // $booking->booking_date_from = $fareFromTo->zone_from;
                    // $booking->booking_date_to = $fareFromTo->zone_to;
                    $booking->route_type = $request->route_type;
                    $booking->start_address = $request->start_address ?? 'test';
                    $booking->end_address = $request->end_address ?? 'test';
                    $booking->start_address_zipcode = $request->start_address_zipcode ?? '12121';
                    $booking->end_address_zipcode = $request->end_address_zipcode ?? '21212';
                    $booking->start_address_lat = $request->start_address_lat ?? '57.23';
                    $booking->start_address_lng = $request->start_address_lng ?? '128.24';
                    $booking->end_address_lat = $request->end_address_lat ?? '58.24';
                    $booking->end_address_lng = $request->end_address_lng ?? '128.25';
                    $booking->total_price = $total_price;
                    $booking->luggage_count = $request->luggage_count;
                    $booking->person_count = $request->person_count;
                }



                $user = new User();
                $user->name = $request->first_name . " " . $request->last_name;
                $user->email = $request->email;
                $user->password = bcrypt('test123');
                $user->role_id = 2;
                $userResult = $user->save();
                $booking->user_id = $user->id;

                $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET_KEY'));

                $checkout_session = $stripe->checkout->sessions->create([
                    'line_items' => [[
                        'price_data' => [
                            'currency' => 'usd',
                            'product_data' => [
                                'name' => 'Limousine Service',
                            ],
                            'unit_amount' => $total_price * 100,
                        ],
                        'quantity' => 1,
                    ]],
                    'mode' => 'payment',
                    'success_url' => route('booking.success', [], true) . "?session_id={CHECKOUT_SESSION_ID}",
                    'cancel_url' => route('booking.cancel', [], true),
                ]);
                $booking->session_id = $checkout_session->id;
                $booking->status = 'unpaid';
                $bookingResult = $booking->save();

                if ($bookingResult == true && $userResult == true) {
                    Session()->flash('message', 'Data Saved Successful.!!');
                    Session()->flash('alert-class', 'alert-success');
                    session()->forget('bookingData');
                    return redirect($checkout_session->url);
                } else {

                    Session()->flash('message', 'Error Occured.!!');
                    Session()->flash('alert-class', 'alert-danger');
                }
                return $checkout_session->url;
            });
            return $session_url;
            // dd($session_url);
            // return redirect($session_url);
        } catch (QueryException $e) {
            if ($e->errorInfo[1] == 1062) {
                return redirect()->back()->with('error', 'The email address is already registered.');
            } else {

                return redirect()->back()->with('error', 'An unexpected error occurred.');
            }
        }
    }

    public function success(Request $request)
    {
        try {
            $sessionId = $request->session_id;
            $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET_KEY'));
            $session = $stripe->checkout->sessions->retrieve($sessionId);
            // dd($stripe->checkout->sessions->retrieve($sessionId));
            // dd($session);
            // $customer = $stripe->customers->retrieve($session->customer);
            $booking = Booking::where('session_id', $session->id)->first();
            $customer = $booking->user;
            if (!$booking) {
                throw new NotFoundHttpException();
            }
            if ($booking->status == 'unpaid') {
                $booking->status = 'paid';
                $booking->save();
            }

            return view('booking-success', compact('customer'));
        } catch (\Exception $e) {
            throw new NotFoundHttpException();
        }
    }
    public function cancel()
    {
        // return redirect('https://laravel.com/docs/11.x/redirects');
        return view('booking-cancel');
    }

    public function webhook()
    {
        $stripe = new \Stripe\StripeClient(env("STRIPE_SECRET_KEY"));
        $endpoint_secret = env("STRIPE_WEBHOOK_SECRET");

        $payload = @file_get_contents('php://input');
        $sig_header = $_SERVER['HTTP_STRIPE_SIGNATURE'];
        $event = null;

        try {
            $event = \Stripe\Webhook::constructEvent(
                $payload,
                $sig_header,
                $endpoint_secret
            );
        } catch (\UnexpectedValueException $e) {
            // Invalid payload
            return response()->json(['error' => 'Invalid payload'], 400);
        } catch (\Stripe\Exception\SignatureVerificationException $e) {
            // Invalid signature
            return response()->json(['error' => 'Invalid signature'], 400);
        }

        // Handle the event
        switch ($event->type) {
            case 'checkout.session.succeeded':
                $session = $event->data->object;
                $sessionId = $session->id;
                $booking = Booking::where('session_id', $sessionId)->where('status', 'unpaid')->first();
                if ($booking && $booking->status == 'unpaid') {
                    $booking->status = 'paid';
                    $booking->save();
                }

            default:
                echo 'Received unknown event type ' . $event->type;
        }
        return response();
    }
}
