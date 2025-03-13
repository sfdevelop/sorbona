<?php

namespace App\Models\NovaPochta;

use Illuminate\Database\Eloquent\Model;

class NovaPochtaCity extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'ref',
        'region_ref',
        'name_ru',
        'name_uk',
    ];
}
