<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;

class CategoriiInformatii extends Model
{
    use Translatable;
    protected $translatable = ['nume'];
    protected $table="categorii_informatii";

    public function info(){
        return $this ->belongsToMany("App\Info", 'info_categorii_informatii','categorii_informatii_id', 'info_id');
    }
}
