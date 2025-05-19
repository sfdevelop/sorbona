<?php

namespace App\Models;

// use App\Model\Traits\Filterable;
use App\Models\Traits\TranslateScopeTrait;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class NovaPochtaDetachment extends Model implements TranslatableContract
{
    //    use Filterable;
    use Translatable;
    use TranslateScopeTrait;

    public array $translatedAttributes = [
        'region',
        'city',
        'address',
    ];

    protected $fillable = [
        'id',
    ];
}
