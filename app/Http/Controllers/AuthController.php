<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('authentication.login');
    }

    public function login(Request $request)
    {
        // Your login logic here

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            // Authentication passed
            $user = Auth::user();
            if($user->role_id==1){
            return redirect('admin/dashboard');
            }
        }

        // Authentication failed
        return back()->withErrors(['email' => 'Invalid credentials']);
    }

    public function showRegistrationForm()
    {
        return view('authentication.signup');
    }

    public function register(Request $request)
    {
        // Your registration logic here

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role_id'=>2
        ]);
        dd($user);

        Auth::login($user);

        return redirect()->route('dashboard');
    }
    // app/Http/Controllers/AuthController.php

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

}
