<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Mail\Message;
use App\Http\Models\ContactUsQueries;

class WebsiteController extends Controller
{
    //
    public function index(){
        return view('index');
    }

    public function aboutUs(){
        return view('aboutus');
    }
    public function booking(){
        return view('booking');
    }
    public function contactUs(){
        return view('contactus');
    }
    public function services(){
        return view('services');
    }
    public function contactUsForm(Request $request){
        $html = '<html>
        <label>Name</label>
        <p>{{ $request->name }}</p>
        <br>
        <label>Email</label>
        <p>{{$request->email}}</p>
        <br>
        <label>Message</label>
        <p>{{$request->message}}</p>
        <br>
    </html>';
    Mail::send([], [], function (Message $message) use ($html) {
        $message->to('k.maaz.ali@gmail.com')
            ->subject('my subject')
            ->from('k.maaz.ali@gmail.com')
            ->html($html);
    });
    $query = new ContactUsQueries([
        'name'=>$request->name,
        'email'=>$request->email,
        'message'=>$request->message
    ]);
    $query->save();
    return view('contactus')->with('notification', [
        'type' => 'success',
        'message' => 'Your Query Submitted Successfully',
    ]);
    }
}
