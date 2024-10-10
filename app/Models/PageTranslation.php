<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PageTranslation extends Model
{
    use HasFactory;

    protected $table = 'page_translations';

    public $timestamps = false;

    /**
     * @var string[]
     */
    protected $fillable = [
        'title',
        'description',
        'titleSectionAboutUs',
        'titleDownAboutUs',
        'descriptionRememberAboutUs',
        'textFeedBackAboutUs',

        'descriptionShort',
        'notoriety',
        'assortment',
        'cooperate',
        'comfort',
    ];
}
