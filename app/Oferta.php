<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;

class Oferta extends Model
{
    use Translatable;
    protected $translatable = ['titlu', 'continut', 'descriere'];
    protected $table="oferta";
}
