<?php

namespace App\Models;

use App\Models\Traits\TranslateScopeTrait;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class StatesNovaPochta extends Model implements TranslatableContract
{
    use Translatable;
    use TranslateScopeTrait;

    protected $table = 'states_nova_pochtas';

    public array $translatedAttributes = [
        'region',
        'city',
        'address',
    ];

    protected $fillable = [
        'id',
    ];
}
