<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MetadataTranslation extends Model
{
    use HasFactory;

    protected $table = 'metadata_translations';

    public $timestamps = false;

    protected $fillable = [
        'title_seo',
        'description_seo',
    ];
}
