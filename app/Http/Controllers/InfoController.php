<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Info;
use App\CategoriiInformatii;

class InfoController extends Controller
{
    public function index(){

        $categorii_info = CategoriiInformatii::get()->translate(\App::getLocale(), 'ro');

        $informatii = Info::withTranslations()->get()->translate(\App::getLocale(), 'ro');
        return view("informatii", ["informatii"=>$informatii, 'categorii_info' => $categorii_info]);
    }

    public function infos($link){

        $categorii_info = CategoriiInformatii::get();
        
        foreach($categorii_info as $categorie){
            if($categorie->slug == $link){
                // $informatii = Info::where("categorie_id", '=', $categorie->id)->get()->translate(\App::getLocale(), 'ro');
                $informatii = $categorie->info;
            }
        }
        $categorii_info = $categorii_info->translate(\App::getLocale(), 'ro');
        return view("informatii", ["informatii" => $informatii, 'categorii_info' => $categorii_info]);
    }

    public function informatie($link){

        $informatie = Info::where("slug", $link)->first();
        $informatii_multiple=Info::withTranslations()->take(6)->get()->translate(\App::getLocale(), 'ro');
        if($informatie){
            $informatie = $informatie->translate(\App::getLocale(), 'ro');
            return view("informatie", ["informatie"=>$informatie,"informatii_multiple"=>$informatii_multiple]);
        }
        else{
            return abort(404, "Serviciul nu a fost gasit.");
        }
        
    }
}
