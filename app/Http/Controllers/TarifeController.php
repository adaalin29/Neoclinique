<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Serviciu;
use App\Tarif;
use App\CategorieTarife;

class TarifeController extends Controller
{
    public function index(){
        $categorii = CategorieTarife::get()->translate(\App::getLocale(), 'ro');
        $servicii = Serviciu::get()->translate(\App::getLocale(), 'ro');
      
        $tarife = Tarif::get();
        return view("tarife", ["categorii"=>$categorii, 'tarife'=>$tarife, 'servicii'=>$servicii]);
    }

    public function tarife($link){

        $categorii = CategorieTarife::get();
        $servicii = Serviciu::get()->translate(\App::getLocale(), 'ro');
      
        foreach($categorii as $categorie){
            if($categorie->slug == $link){
                // $tarife = Tarif::where("categorie_id", '=', $categorie->id)->get()->translate(\App::getLocale(), 'ro');
                $tarife = $categorie->tarif;
            }
        }
        $categorii = $categorii->translate(\App::getLocale(), 'ro');
        return view("tarife", ["tarife" => $tarife, 'categorii' => $categorii, 'servicii'=>$servicii]);
    }
}