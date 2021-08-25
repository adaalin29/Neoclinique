<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;

class CategorieBlog extends Model
{
    use Translatable;
    protected $translatable = ['nume'];
    protected $table="categorie_blog";

    public function articole(){
        return $this ->belongsToMany("App\Articol", 'articol_categorie_blog', 'categorie_blog_id', 'articol_id');
    }
}
