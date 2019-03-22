<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeltes;

class Item extends Model
{
    use SoftDeletes;
}
