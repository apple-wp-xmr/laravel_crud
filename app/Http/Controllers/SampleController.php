<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\SimpleService;

class SampleController extends Controller
{
    public $simpleService;


    public function index(Request $request)
    {
       
    }


    public function calculate(Request $request, SimpleService $service){
    //    dd($service->start($request->all(), 'minus'));
     dd( app('price')->start($request->all(), 'minus'));
     
    }
}
