<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    protected $table = 'order_items';

    public $timestamps = false;

    protected $perPage = 20;

    protected $fillable = [
        'order_id',
        'title',
        'qty',
        'price_item',
        'price_all',
        'img',
        'size',
        'color',
    ];
}
