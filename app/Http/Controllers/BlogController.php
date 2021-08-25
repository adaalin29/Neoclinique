<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Articol;
use App\CardInformatii;
use App\CategorieBlog;

class BlogController extends Controller
{
    public function index(){
        $articole = Articol::get();
        $articole = $articole->translate(\App::getLocale(), 'ro');
      
        $categorii_blog = CategorieBlog::get()->translate(\App::getLocale(), 'ro');

        return view("blog", ["articole"=>$articole, 'categorii_blog'=>$categorii_blog]);
    }

    public function articol($link){

        $articol = Articol::where("slug", $link)->first();
        $articole_multiple=Articol::take(6)->get();
//        dd($articol);
      
        if($articol){
            $articol = $articol->translate(\App::getLocale(), 'ro');
            return view("articol", ["articol"=>$articol,"articole_multiple"=>$articole_multiple]);
        }
        else{
            return abort(404, "Articolul nu a fost gasit.");
        }
        
    }
  public function blog($link){

        $categorii_blog = CategorieBlog::get()->translate(\App::getLocale(), 'ro');
        
        foreach($categorii_blog as $categorie){
            if($categorie->slug == $link){
                // $articole = Articol::where("categorie_id", '=', $categorie->id)->get()->translate(\App::getLocale(), 'ro');
                $articole = $categorie->articole;
            }
        }
        $articole = $articole->translate(\App::getLocale(), 'ro');
        return view("blog", ["articole" => $articole, 'categorii_blog' => $categorii_blog]);
    }
}
