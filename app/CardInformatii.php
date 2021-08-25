<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;

class CardInformatii extends Model
{
    use Translatable;
    protected $translatable = ['titlu', 'continut'];
    protected $table="card_informatii";
}
