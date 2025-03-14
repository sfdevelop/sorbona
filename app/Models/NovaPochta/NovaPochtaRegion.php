<?php

namespace App\Models\NovaPochta;

use Illuminate\Database\Eloquent\Model;

class NovaPochtaRegion extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'ref',
        'name_ru',
        'name_uk',
    ];
}
