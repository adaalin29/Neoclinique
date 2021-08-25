<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConsultatiiController extends Controller
{
    public function index(){
        return view("consultatii");
    }
}
