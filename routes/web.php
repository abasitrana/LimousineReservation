<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\WebsiteController;
use App\Http\Controllers\HourlySlabController;
use App\Models\Role;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });


//Website Routes
Route::get('/', 'App\Http\Controllers\WebsiteController@index')->name('home');
Route::get('/admin', 'App\Http\Controllers\AuthController@showLoginForm');
Route::get('/about-us', 'App\Http\Controllers\WebsiteController@aboutUs');
Route::get('/booking', 'App\Http\Controllers\WebsiteController@booking')->name('booking');
Route::get('success', 'App\Http\Controllers\BookingController@success')->name('booking.success');
Route::get('cancel', 'App\Http\Controllers\BookingController@cancel')->name('booking.cancel');
Route::post('webhook', 'App\Http\Controllers\BookingController@webhook')->name('webhook');
Route::post('bookings', 'App\Http\Controllers\BookingController@checkout')->name('checkout');

Route::get('test', 'App\Http\Controllers\WebsiteController@test');

Route::get('google-maps-test', function () {
    return view('google-maps-example');
});

Route::post('/getRouteType', 'App\Http\Controllers\WebsiteController@getRouteType')->name('getRouteType');
Route::post('booking-set', 'App\Http\Controllers\WebsiteController@bookingSession')->name('WebsiteController.bookingSession');
Route::post('booking-create', 'App\Http\Controllers\WebsiteController@createBooking')->name('WebsiteController.createBooking');
Route::get('/contact-us', 'App\Http\Controllers\WebsiteController@contactUs');
Route::get('/services', 'App\Http\Controllers\WebsiteController@services');
Route::post('/contact-us', 'App\Http\Controllers\WebsiteController@contactUsForm');
Route::get('getfleetdata', 'App\Http\Controllers\FleetController@getFleets');
Route::get('/login', 'App\Http\Controllers\AuthController@showLoginForm')->name('login');
Route::post('login', 'App\Http\Controllers\AuthController@login');

Route::get('/signup', 'App\Http\Controllers\AuthController@showRegistrationForm')->name('signup');
Route::post('signup', 'App\Http\Controllers\AuthController@register');

Route::post('get-fare', 'App\Http\Controllers\WebsiteController@getFarePrice')->name('get-fare');

Route::post('get-slaps-price', 'App\Http\Controllers\WebsiteController@getSlapsPrice')->name('get-slaps-price');


Route::prefix('admin')->middleware(['admin'])->group(function () {


    Route::get('dashboard', 'App\Http\Controllers\DashboardController@showDashboard');
    Route::get('logout', 'App\Http\Controllers\AuthController@logout');
    Route::get('fleet', 'App\Http\Controllers\FleetController@fleetDashboard')->name('admin.fleets');
    Route::get('add/fleet', 'App\Http\Controllers\FleetController@addFleet');
    Route::post('add/fleet', 'App\Http\Controllers\FleetController@addFleetData');
    Route::get('edit/fleet/{id}', 'App\Http\Controllers\FleetController@editFleet');
    Route::post('edit/fleet', 'App\Http\Controllers\FleetController@editFleetData');
    Route::get('delete/fleet/{id}', 'App\Http\Controllers\FleetController@deleteFleet');
    Route::get('contact-forms', 'App\Http\Controllers\DashboardController@contactFormSubmissionQueries');
    Route::get('contactformdata', 'App\Http\Controllers\DashboardController@contactFormQueries');

    //Cars Management
    Route::get('cars', 'App\Http\Controllers\CarsController@getCars')->name('admin.cars');
    Route::get('carsdata', 'App\Http\Controllers\CarsController@getCarsData');
    Route::get('addcars', 'App\Http\Controllers\CarsController@addCarsForm');
    Route::post('addcars', 'App\Http\Controllers\CarsController@addCars');
    Route::get('editcars/{id}', 'App\Http\Controllers\CarsController@editCars');
    Route::post('editcars/{id}', 'App\Http\Controllers\CarsController@editCar')->name('update-car');
    Route::get('delete/car/{id}', 'App\Http\Controllers\CarsController@deleteCar');

    //Hourly Packages
    Route::get('hourly', 'App\Http\Controllers\CarsController@hourly')->name("admin.hourly.hourly");
    Route::get('addhourly', 'App\Http\Controllers\CarsController@addHourly');
    Route::post('addhourly', 'App\Http\Controllers\CarsController@addHourlyData');
    Route::get('hourlydata', 'App\Http\Controllers\CarsController@hourlyData');
    Route::get('edithourly/{id}', 'App\Http\Controllers\CarsController@editHourly');
    Route::post('updatehourly/{id}', 'App\Http\Controllers\CarsController@updateHourly');
    Route::get('delete/deletehourly/{id}', 'App\Http\Controllers\CarsController@deleteHourly');

    //Hourly Slabs Packages
    Route::get('hourlyslab', 'App\Http\Controllers\HourlySlabController@hourlySlab')->name("admin.hourly_slabs.hourlySlabs");
    Route::get('gethourlyslabs', 'App\Http\Controllers\HourlySlabController@getHourlySlabs');
    Route::get('addhourlyslab', 'App\Http\Controllers\HourlySlabController@addHourlySlab');
    Route::post('addhourlyslab', 'App\Http\Controllers\HourlySlabController@addHourlySlabData');
    Route::get('edithourlyslab/{id}', 'App\Http\Controllers\HourlySlabController@editHourlySlab');
    Route::post('updatehourlyslab/{id}', 'App\Http\Controllers\HourlySlabController@updateHourlySlab');
    Route::get('delete/deletehourlyslab/{id}', 'App\Http\Controllers\HourlySlabController@deleteHourlySlab');

    // Hourly Slap Ajax Call
    Route::post('extrahourlyslabs', 'App\Http\Controllers\CarsController@getSlabsData')->name("admin.getSlabsData");

    //Booking Data
    Route::get('bookingdata', 'App\Http\Controllers\BookingController@getBookingsData');
    Route::get('bookings', 'App\Http\Controllers\BookingController@booking')->name('admin.bookings');
    Route::get('addbookings', 'App\Http\Controllers\BookingController@addbooking');
    Route::post('addbookings', 'App\Http\Controllers\BookingController@addbookingdata')->name('admin.submit.booking');


    //Zonal Management
    Route::get('zone', 'App\Http\Controllers\ZonalController@getZones')->name('admin.zones');
    Route::get('zonesdata', 'App\Http\Controllers\ZonalController@getzonesData');
    Route::get('addzone', 'App\Http\Controllers\ZonalController@create');
    Route::post('addzone', 'App\Http\Controllers\ZonalController@store')->name('admin.zones.addzone');
    Route::get('editzone/{id}', 'App\Http\Controllers\ZonalController@editZone');
    Route::post('updatezone/{id}', 'App\Http\Controllers\ZonalController@updateZone');
    Route::get('deletezone/{id}', 'App\Http\Controllers\ZonalController@deleleteZone');

    Route::get('get-cities', 'App\Http\Controllers\ZonalController@getCities')->name('get-cities');


    //Fare Management
    Route::get('fare', 'App\Http\Controllers\FareController@getfares')->name('admin.fares');
    Route::get('faresdata', 'App\Http\Controllers\FareController@getfaresData');
    Route::get('addfare', 'App\Http\Controllers\FareController@create');
    Route::post('addfare', 'App\Http\Controllers\FareController@store')->name('admin.fares.addfare');
    Route::get('editfare/{id}', 'App\Http\Controllers\FareController@editfare');
    Route::post('updatefare/{id}', 'App\Http\Controllers\FareController@updatefare');
    Route::get('deletefare/{id}', 'App\Http\Controllers\FareController@deleletefare');
});
