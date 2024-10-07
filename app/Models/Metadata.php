<?php

namespace App\Models;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Metadata extends Model implements TranslatableContract
{
    use HasFactory;
    use Translatable;

    protected $table = 'metadata';

    protected $guarded = false;

    protected $casts = [
        'created_at' => 'datetime:d/m/Y',
        'updated_at' => 'datetime:d/m/Y',
    ];

    public array $translatedAttributes = [
        'title_seo',
        'description_seo',
    ];

    /**
     * @return MorphTo
     */
    public function metadataable(): MorphTo
    {
        return $this->morphTo();
    }
}
