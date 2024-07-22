<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RequestPasswordResetController extends Controller
{
    public function index()
    {
        return view('/requestpasswordreset');
    }

    public function sendToken(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
        ]);

        $user = User::where('email', $request->input('email'))->first();

        if (!$user) {
            return back()->withErrors(['email' => 'Invalid email address.']);
        }

        // Generate a one-time password reset token
        $token = Str::random(60);

        // Store the token in the database
        DB::table('password_resets')->insert([
            'email' => $request->input('email'),
            'token' => $token,
            'created_at' => Carbon::now()
        ]);

        // Send the token to the user's alternative email address
        Mail::to($user->alternative_email)->send(new PasswordResetToken($token));

        return redirect()->route('enter-token');
    }
}





