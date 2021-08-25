<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;

class Noutati extends Model
{
    use Translatable;
    protected $translatable = ['nume', 'continut'];
    protected $table="noutati";
}
