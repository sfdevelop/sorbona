<?php

namespace App\Models;

use App\Models\Traits\CreatedFormatTrait;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    use HasFactory;
    use CreatedFormatTrait;

    protected $table = 'currencies';
    protected $perPage = 20;

        /**
         * @var string[]
         */
        protected $fillable = [
            'title',
            'currency',
        ];

    protected function currency(): Attribute
    {
        return Attribute::make(
            set: fn ($value) => str_replace(',', '.', $value),
        );
    }
}
