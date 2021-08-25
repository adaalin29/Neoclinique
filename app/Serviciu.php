<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;

class Serviciu extends Model
{
    use Translatable;
    protected $translatable = ['nume', 'continut', 'descriere'];
    protected $table="serviciu";
    public function echipa(){
        return $this ->belongsToMany("App\Echipa", 'serviciu_echipa', 'serviciu_id', 'echipa_id');
    }
    public function tarife(){
        return $this ->belongsToMany("App\CategorieTarife", 'serviciu_categorie_tarife', 'serviciu_id', 'categorie_tarife_id');
    }
}
