<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Noutati;

class NoutatiController extends Controller
{
    public function index(){

        $noutati = Noutati::withTranslations()->get();
        $noutati = $noutati->translate(\App::getLocale(), 'ro');
        return view("noutati", ["noutati"=>$noutati]);
    }
    public function noutate($link){

        $noutate = Noutati::where("slug", $link)->first();
        if($noutate){
            $noutate = $noutate->translate(\App::getLocale(), 'ro');
            return view("noutate", ["noutate"=>$noutate]);
        }
        else{
            return abort(404, "Serviciul nu a fost gasit.");
        }
        
    }
}
