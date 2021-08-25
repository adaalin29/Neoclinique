<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;

class CategorieEchipa extends Model
{
    use Translatable;
    protected $translatable = ['nume'];
    protected $table="categorie_echipa";

    public function membri(){
        return $this ->belongsToMany("App\Echipa", 'echipa_categorie_echipa', 'categorie_echipa_id', 'echipa_id');
    }
}
