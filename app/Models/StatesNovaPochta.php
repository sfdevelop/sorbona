<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StatesNovaPochta extends Model
{
    protected $table = 'states_nova_pochtas';

    protected $fillable = [
        'id',
        'region',
        'city',
        'address',
    ];
}
