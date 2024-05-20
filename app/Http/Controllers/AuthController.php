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
            if ($user->role_id == 1)
            {
                return redirect('admin/dashboard');

            }
            // elseif($user->role_id == 2)
            // {
            //     return redirect('/');
            // }
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

        $signupValidation = $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users|max:255',
            'password' => 'required|min:6',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role_id' => 2
        ]);
        // dd($user);


        // Auth::login($user);
        if ($user) {
            return redirect()->route('login')->withSuccess("You have registered successfully and you may able to log in");
        } else {
            return redirect()->back()->withInput()->withErrors($signupValidation);
        }
    }
    // app/Http/Controllers/AuthController.php

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
