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
        'work',
        'weekend',
        'text',
        'textForMail',
    ];

    protected $fillable = [
        'facebook',
        'instagram',
        'linkedin',
        'email',
        'phone',
        'phone2',
    ];
}
