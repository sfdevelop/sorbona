<?php

namespace App\Models;

use App\Models\Traits\CreatedFormatTrait;
use App\Models\Traits\TranslateScopeTrait;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ManufacturerTranslation extends Model
{
    use HasFactory;

    protected $table = 'manufacturer_translations';

    public $timestamps = false;

    /**
     * @var string[]
     */
    protected $fillable = [
        'title',
        'description',
        'all_title',
        'specialization',
        'flat',
    ];
}
