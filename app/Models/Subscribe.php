<?php

namespace App\Models;

use App\Events\SubscribeMailEvent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscribe extends Model
{
    use HasFactory;

    protected $table = 'subscribes';

    protected $perPage = 20;

    protected $fillable = ['email'];

    protected $dispatchesEvents = [
        'created' => SubscribeMailEvent::class,
    ];
}
