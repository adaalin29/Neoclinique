<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;


class Echipa extends Model
{
    use Translatable;
    protected $translatable = ['continut'];

    protected $table="echipa";
    public function caz(){
        return $this ->belongsToMany("App\Caz", 'caz_echipa', 'caz_id', 'echipa_id');
    }

    public function serviciu(){
        return $this ->belongsToMany("App\Serviciu", 'echipa_serviciu', 'echipa_id', 'serviciu_id');
    }

    public function categorii(){
        return $this ->belongsToMany("App\CategorieEchipa", 'echipa_categorie_echipa', 'echipa_id', 'categorie_echipa_id');
    }

}
