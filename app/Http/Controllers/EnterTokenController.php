<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EnterTokenController extends Controller
{
    public function index(Reaquest $request, $token)
    {
        return view('entertoken', ['token' => $token]);
    }
}
