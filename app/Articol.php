<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;

class Articol extends Model
{
    use Translatable;
    protected $translatable = ['titlu', 'continut'];
    protected $table="articol";

    public function bloguri(){
        return $this ->belongsToMany("App\CategorieBlog", 'articol_categorie_blog', 'articol_id', 'categorie_blog_id');
    }

}
