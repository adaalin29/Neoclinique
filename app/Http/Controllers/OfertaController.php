<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Oferta;
use App\Testimonial;
use App\Serviciu;

class OfertaController extends Controller
{
    public function index(){
        $oferte = Oferta::where("activ", '=', "1")->get();
        $oferte = $oferte->translate(\App::getLocale(), 'ro');

        $testimoniale = Testimonial::get();
        $testimoniale = $testimoniale->translate(\App::getLocale(), 'ro');

        $servicii = Serviciu::get();
        $servicii = $servicii->translate(\App::getLocale(), 'ro');

        return view("oferte", ["oferte"=>$oferte, "testimoniale"=>$testimoniale, "servicii"=>$servicii]);
    }

    public function oferta($link){

        $servicii = Serviciu::get()->translate(\App::getLocale(), 'ro');

        $oferta = Oferta::where("slug",'=', $link)->first();
        if($oferta && $oferta->activ=="1"){
            $oferta = $oferta->translate(\App::getLocale(), 'ro');
            return view("oferta", ["oferta"=>$oferta, "servicii"=>$servicii]);
        }
        else{
            return abort(404, "Oferta nu a fost gasita.");
        }
        
    }
}
