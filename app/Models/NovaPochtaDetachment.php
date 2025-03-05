<?php

namespace App\Models;

// use App\Model\Traits\Filterable;
use Illuminate\Database\Eloquent\Model;

class NovaPochtaDetachment extends Model
{
    //    use Filterable;

    protected $fillable = [
        'region',
        'city',
        'address',
        'sitikey',

    ];
}
