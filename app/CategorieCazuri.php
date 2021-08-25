<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;

class CategorieCazuri extends Model
{
    use Translatable;
    protected $translatable = ['nume'];
    protected $table="categorie_cazuri";
  
    public function cazuri(){
        return $this ->belongsToMany("App\Caz", 'caz_categorie_cazuri', 'categorie_cazuri_id', 'caz_id');
    }

}