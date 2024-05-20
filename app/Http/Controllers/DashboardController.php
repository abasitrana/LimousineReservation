<?php

namespace App\Http\Controllers;

use App\Models\ContactUsQueries;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function showDashboard(){
        return view("admin.dashboard");
    }

    public function contactFormQueries()
    {
        $contact_forms = ContactUsQueries::get();
        return response()->json(['data'=>$contact_forms]);
    }

    public function contactFormSubmissionQueries()
    {
        return view('admin.contactforms.contactforms');
    }
}
