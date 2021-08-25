<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use App\Serviciu;
use App\Echipa;
use App\Tarif;
use App\CardInformatii;

class ServiciiController extends Controller
{
    public function index(){
        // dd(\App::getLocale());
        $servicii = Serviciu::where("activ", '=', "1")->get();
        $servicii = $servicii->translate(\App::getLocale(), 'ro');

        $card = CardInformatii::where('descriere', '=', 'card servicii')->first();
        $card = $card->translate(\App::getLocale(), 'ro');

        return view("servicii", ["servicii"=>$servicii, 'card'=>$card]);
    }

    public function serviciu($link){

        
        $serviciu = Serviciu::where("slug", '=', $link)->with('tarife')->first();
        // dd($serviciu);
        $servicii = Serviciu::get();
        $servicii = $servicii->translate(\App::getLocale(), 'ro');
        $id_serviciu = $serviciu->id;
        $echipa = Echipa::with(array('serviciu'=>function($query) use ($id_serviciu){
            $query->select()->where('serviciu_id',$id_serviciu);
           }))->get();
           foreach($echipa as $key => &$persoana){
               if($persoana->serviciu == null || count($persoana->serviciu)<=0){
                    unset($echipa[$key]);
               }
           }

        $echipa = $echipa->translate(\App::getLocale(), 'ro');

        if($serviciu && $serviciu->activ=="1"){
        $serviciu = $serviciu->translate(\App::getLocale(), 'ro');
       // dd($echipa);
            return view("serviciu", ["serviciu"=>$serviciu, 'echipa'=>$echipa, 'servicii'=>$servicii]);
        }
        else{
            return abort(404, "Serviciul nu a fost gasit.");
        }
        
    }
}
