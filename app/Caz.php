<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;

class Caz extends Model
{
    use Translatable;
    protected $translatable = ['titlu', 'continut', 'descriere'];
    protected $table="caz";
  
    public function categorii(){
        return $this ->belongsToMany("App\CategorieCazuri", 'caz_categorie_cazuri', 'caz_id', 'categorie_cazuri_id');
    }

    public function tarife(){
        return $this ->belongsToMany("App\CategorieTarife", 'caz_categorie_tarife', 'caz_id', 'categorie_tarife_id');
    }
   
  
  
  
  public function echipe()
    {
         return $this ->belongsToMany("App\Echipa", 'caz_echipa', 'caz_id', 'echipa_id');
    }
  
}
