<?php

namespace App\Http\Controllers;
use App\Echipa;
use Illuminate\Http\Request;
use App\Caz;
use App\Serviciu;
use App\Testimonial;
use App\Clinica;
use App\CategorieEchipa;

class EchipaController extends Controller
{
    public function index(){

        $echipa = Echipa::get();
        $echipa = $echipa->translate(\App::getLocale(), 'ro');

        $testimoniale = Testimonial::get();
        $testimoniale = $testimoniale->translate(\App::getLocale(), 'ro');
       
        $clinici = CategorieEchipa::get();
        //$echipa = Echipa::get();
       
        return view("echipa", [
            "echipa"=>$echipa,
            'testimoniale'=>$testimoniale,
            'clinici' => $clinici
            ]);
    }

    public function persoana_detaliu($link){

        $persoana = Echipa::with("caz")->where("slug",'=', $link)->first();
        $servicii = Serviciu::get();
        $servicii = $servicii->translate(\App::getLocale(), 'ro');

        $testimoniale = Testimonial::get();
        $testimoniale = $testimoniale->translate(\App::getLocale(), 'ro');
        //dd($persoana);
        //dd($servicii->toArray());
        if($persoana){
            $persoana = $persoana->translate(\App::getLocale(), 'ro');
            $cazuri = $persoana->caz;
            $cazuri = $cazuri->translate(\App::getLocale(), 'ro');
            return view("persoana", [
                "persoana"=>$persoana,
                "cazuri"=> $cazuri,
                'servicii' => $servicii,
                'testimoniale' => $testimoniale,
            ]);
        }
        else{
            return abort(404, "Serviciul nu a fost gasit.");
        }
        
    }

    public function clinica($link){
        $clinici = CategorieEchipa::get();
        foreach($clinici as $clinica){
            if($clinica->slug == $link){
                // $echipa = Echipa::where('clinica_id', '=', $clinica->id)->get();
                $echipa = $clinica->membri;
                // dd($echipa);
            }
        }
        $echipa = $echipa->translate(\App::getLocale(), 'ro');

        $testimoniale = Testimonial::get();
        $testimoniale = $testimoniale->translate(\App::getLocale(), 'ro');

        return view("echipa", [
            "echipa"=>$echipa,
            'testimoniale'=>$testimoniale,
            'clinici' => $clinici
            ]);
    }
}
