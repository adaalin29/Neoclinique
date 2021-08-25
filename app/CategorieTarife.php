<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;

class CategorieTarife extends Model
{
    use Translatable;
    protected $translatable = ['nume'];
    protected $table="categorie_tarife";

    public function tarif(){
        return $this ->belongsToMany("App\Tarif", 'tarif_categorie_tarife','categorie_tarife_id', 'tarif_id');
    }
}
