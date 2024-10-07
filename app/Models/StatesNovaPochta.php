<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatesNovaPochta extends Model
{
    use HasFactory;

    protected $table = 'states_nova_pochtas';

    protected $fillable = [
        'id',
        'region',
        'city',
        'address',
    ];
}
