<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WomenController extends Controller
{
    public function index(){
        return view('/women');
    }
}
