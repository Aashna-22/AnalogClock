<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnalogClockController extends Controller
{
    public function index(){
        return view('analog-clock');
    }
}
