<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;

class CategorieGalerie extends Model
{
    use Translatable;
    protected $translatable = ['nume'];
    protected $table="categorie_galerie";
}
