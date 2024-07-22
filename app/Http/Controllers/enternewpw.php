<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class enternewpw extends Controller
{
    public function showEnterNewPassword()
    {
        return view('NewPasswordCreated');
    }
}
