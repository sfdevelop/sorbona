<?php

namespace App\Models;

use App\Models\Traits\CreatedFormatTrait;
use App\Models\Traits\TranslateScopeTrait;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FilterTranslation extends Model
{
    use HasFactory;

    protected $table = 'filter_translations';

    public $timestamps = false;

    /**
     * @var string[]
     */
    protected $fillable = [
        'title',
    ];
}
