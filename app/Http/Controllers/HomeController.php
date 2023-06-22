<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function factorauth()
    {
        return view('factorauth');
    }

    public function verifyFactorAuth(Request $request)
    {
        $this->validate($request, [
            'one_time_password' => 'required',
        ]);

        // Retrieve the user based on the logged-in user's ID
        $user = Auth::user();

        // Verify the provided OTP (One-Time Password)
        if ($user->verifyOTP($request->one_time_password)) {
            // Clear the OTP from the user's record
            $user->clearOTP();
            $user->save();

            // Redirect the user to the intended page after successful OTP verification
            return redirect('/home');
        }

        // If the OTP verification fails, redirect back with errors
        return redirect()->back()->withErrors(['one_time_password' => 'Invalid One-Time Password']);
    }

}
