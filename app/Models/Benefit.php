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

class Benefit extends Model implements TranslatableContract, HasMedia
{
    use HasFactory;
    use Translatable;
    use CreatedFormatTrait;
    use TranslateScopeTrait;
    use RegisterMediaTrait;

    protected $table = 'benefits';
    protected $perPage = 20;
    protected $with = 'media';

        /**
         * @var array|string[]
         */
        public array $translatedAttributes = [
            'title',
        ];

        /**
         * @var string[]
         */
        protected $fillable = [
            'sort',
        ];

    /**
     * image data
     * $imageWith -with image crop
     * $imageHeight - height image crop
     * $imageCollectionName - image collection name
     * $noImage - url on image photo (no image)
     * */
    private static int $imageWith = 60;

    private static int $imageHeight = 60;

    private static string $imageCollectionName = 'benefit';

    private static string $noImage = '/img/benefit.png';

    protected $appends = [
        'img_jpg',
        'img_web',
        'preview',
        'created_format',
    ];
}
