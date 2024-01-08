<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

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
Route::get('/','App\Http\Controllers\WebsiteController@index');
Route::get('/about-us','App\Http\Controllers\WebsiteController@aboutUs');
Route::get('/booking','App\Http\Controllers\WebsiteController@booking');
Route::get('/contact-us','App\Http\Controllers\WebsiteController@contactUs');
Route::get('/services','App\Http\Controllers\WebsiteController@services');
Route::post('/contact-us','App\Http\Controllers\WebsiteController@contactUsForm');
Route::get('getfleetdata','App\Http\Controllers\FleetController@getFleets');
Route::get('/login','App\Http\Controllers\AuthController@showLoginForm')->name('login');
Route::post('login','App\Http\Controllers\AuthController@login');
Route::prefix('admin')->middleware(['admin'])->group(function () {

Route::get('/signup','App\Http\Controllers\AuthController@showRegistrationForm')->name('signup');
Route::post('signup','App\Http\Controllers\AuthController@register');

Route::get('dashboard','App\Http\Controllers\DashboardController@showDashboard');
Route::get('logout','App\Http\Controllers\AuthController@logout');
Route::get('fleet','App\Http\Controllers\FleetController@fleetDashboard');
Route::get('add/fleet','App\Http\Controllers\FleetController@addFleet');
Route::post('add/fleet','App\Http\Controllers\FleetController@addFleetData');
Route::get('edit/fleet/{id}','App\Http\Controllers\FleetController@editFleet');
Route::post('edit/fleet','App\Http\Controllers\FleetController@editFleetData');
Route::get('delete/fleet/{id}','App\Http\Controllers\FleetController@deleteFleet');

});