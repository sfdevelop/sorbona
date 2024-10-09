<?php

namespace App\Models;

use App\Models\Traits\CreatedFormatTrait;
use App\Models\Traits\RegisterMediaTrait;
use App\Models\Traits\TranslateScopeTrait;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;

class Manufacturer extends Model implements TranslatableContract, HasMedia
{
    use HasFactory;
    use Translatable;
    use CreatedFormatTrait;
    use TranslateScopeTrait;
    use RegisterMediaTrait;

    protected $table = 'manufacturers';
    protected $perPage = 20;
    protected $with = 'media';

        /**
         * @var array|string[]
         */
        public array $translatedAttributes = [
            'title',
            'description',
            'all_title',
            'specialization',
            'flat',
        ];

        /**
         * @var string[]
         */
        protected $fillable = [
            'sort',
            'year',
        ];

    /**
     * image data
     * $imageWith -with image crop
     * $imageHeight - height image crop
     * $imageCollectionName - image collection name
     * $noImage - url on image photo (no image)
     * */
    private static int $imageWith = 150;

    private static int $imageHeight = 44;

    private static string $imageCollectionName = 'manufacturer';

    private static string $noImage = '/img/manufacturer.png';

    protected $appends = [
        'img_jpg',
        'img_web',
        'preview',
        'created_format',
    ];
}
