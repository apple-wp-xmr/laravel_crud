<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index(Request $request)
    {
        dd($request);

        return view('about');
    }
    private function check1 ()
    {

    }
    private function check2 ()
    {

    }
}
