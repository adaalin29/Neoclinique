<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;


class Clinica extends Model
{
    use Translatable;
    protected $translatable = ['nume'];
    protected $table="clinica";
}
