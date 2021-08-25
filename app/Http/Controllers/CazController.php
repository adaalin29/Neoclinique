<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use App\Caz;
use App\Serviciu;
use App\Echipa;
use App\Tarif;
use App\CategorieCazuri;


class CazController extends Controller
{
    public function index(){

        $categorii_cazuri = CategorieCazuri::get();
        $categorii_cazuri = $categorii_cazuri->translate(\App::getLocale(), 'ro');

        $cazuri = Caz::get();
        $cazuri = $cazuri->translate(\App::getLocale(), 'ro');

        return view("cazuri", ["cazuri" => $cazuri, 'categorii_cazuri' => $categorii_cazuri]);
    }

    public function categorii($link){

        $categorii_cazuri = CategorieCazuri::with('cazuri')->get();
        
        

        foreach($categorii_cazuri as $categorie){
            if($categorie->slug == $link){
                // $cazuri = Caz::where("categorie_id", '=', $categorie->id)->get();
                $cazuri = $categorie->cazuri;
                // dd($cazuri);
            }
        }
        $categorii_cazuri = $categorii_cazuri->translate(\App::getLocale(), 'ro');
        $cazuri = $cazuri->translate(\App::getLocale(), 'ro');

        

        return view("cazuri", ["cazuri" => $cazuri, 'categorii_cazuri' => $categorii_cazuri]);
    }

    public function caz($link){

        $caz = Caz::where("slug", $link)->with(['tarife','echipe'])->first();
        $caz = $caz->translate(\App::getLocale(), 'ro');
        $id_caz = $caz->id;

//         $echipa = Echipa::with(array('caz'=>function($query) use ($id_caz){
//             $query->select()->where('caz_id',$id_caz);
//            }))->get();
      
//       $echipa = Echipa::with('caz')->get();
//                    dd($echipa->toArray());
//            foreach($echipa as $key => &$persoana){
//                if($persoana->caz == null || count($persoana->caz)<=0){
//                     unset($persoana->caz);
//                  //dd($echipa[$key]);
//                }
//            }
      
      // dd($echipa);

//         $echipa = $echipa->translate(\App::getLocale(), 'ro');
        $servicii = Serviciu::get();
        $servicii = $servicii->translate(\App::getLocale(), 'ro');
 
        if($caz){
            return view("caz", ["caz"=>$caz,"servicii"=>$servicii]);
        }
        else{
            return abort(404, 'Cazul nu a fost gasit.');
        }
        
    }

}
