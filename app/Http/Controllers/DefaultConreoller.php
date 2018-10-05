<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DefaultConreoller extends Controller
{
    public function privacy()
    {
        return view('default.privacy');
    }

    public function terms()
    {
        return view('default.terms');
    }

    public function payment()
    {
        return view('default.payment');
    }
}
