<?php

namespace App\Models;

use App\Models\Traits\CreatedFormatTrait;
use App\Models\Traits\TranslateScopeTrait;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model implements TranslatableContract
{
    use HasFactory;
    use Translatable;
    use CreatedFormatTrait;
    use TranslateScopeTrait;

    protected $table = 'statuses';
    protected $perPage = 20;

        /**
         * @var array|string[]
         */
        public array $translatedAttributes = [
            'title',
        ];
}
