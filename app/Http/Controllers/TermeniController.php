<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TermeniController extends Controller
{
    public function index(){
        return view("termeni");
    }
}
