<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;

class Info extends Model
{
    use Translatable;
    protected $translatable = ['nume', 'descriere'];
    protected $table="info";

    public function categorii(){
        return $this ->belongsToMany("App\CategoriiInformatii", 'info_categorii_informatii','categorii_informatii_id','info_id');
    }
}
