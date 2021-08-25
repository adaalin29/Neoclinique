<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CategorieGalerie;
use App\Galerie;

class GalerieController extends Controller
{
    // public function index($link){
    //     $galerie = Galerie::with("categorie_galerie")->where("slug",'=', $link)->get();
    //     $categorii = CategorieGalerie::get();
    //     if($galerie){
    //         return view("galerie", 
    //         [
    //             "galerie"   => $galerie,
    //             'categorii' => $categorii
    //         ]);
    //     }
    //     else{
    //         return abort(404, "Galeria nu a fost gasita.");
    //     }
    // }

    //  main render page
    public function index($link){
        $categorii = CategorieGalerie::get();
        foreach($categorii as $categorie){
            if($categorie->slug == $link){
                $poze = Galerie::get()->where("categorie_galerie_id", '=', $categorie->id)->first();
            }
        }
        $categorii = $categorii->translate(\App::getLocale(), 'ro');
        //$categorii = CategorieGalerie::get();
        return view("galerie", 
        [
            "categorii"   => $categorii,
            "poze" => $poze,

        ]);
    }

    // public function arata_poze(Request $request)
    // {
    //      $form_data = $request->only( ["id_galerie"]);
    //      $id_galerie = $form_data['id_galerie'];
    //      $decodat = null;

    //      $galerie = Galerie::where("categorie_galerie_id",'=', $id_galerie)->get();
    //      foreach ($galerie as $decoded)
    //      {
    //          $decodat = json_decode($decoded['imagini']);
    //      }
    //      return
    //      [
    //          'photos' => $decodat
    //      ];

    // }

    
}
