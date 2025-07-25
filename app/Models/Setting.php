<?php

namespace App\Models;

use App\Models\Traits\MetaDataPolymorphic;
use App\Models\Traits\TranslateScopeTrait;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model implements TranslatableContract
{
    use HasFactory;
    use MetaDataPolymorphic;
    use Translatable;
    use TranslateScopeTrait;

    protected $table = 'settings';

    protected $perPage = 20;

    public array $translatedAttributes = [
        'address',
        'textForMail',
        'cooperate',
        'default_address',
        'default_time_work',
    ];

    protected $fillable = [
        'facebook',
        'instagram',
        'email',
        'phone',
        'phone2',
        'map',
        'website',
        'product_per_page',
    ];
}
