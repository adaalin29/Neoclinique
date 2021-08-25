<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;

class Tarif extends Model
{
    use Translatable;
    protected $translatable = ['titlu', 'continut'];
    protected $table="tarif";

    public function categorii(){
        return $this ->belongsToMany("App\CategorieTarife", 'tarif_categorie_tarife', 'tarif_id', 'categorie_tarife_id');
    }
    
}
