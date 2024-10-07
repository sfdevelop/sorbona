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

class Slider extends Model implements HasMedia, TranslatableContract
{
    use CreatedFormatTrait;
    use HasFactory;
    use RegisterMediaTrait;
    use Translatable;
    use TranslateScopeTrait;

    protected $table = 'sliders';

    protected $perPage = 20;

    protected $with = 'media';

    /**
     * @var array|string[]
     */
    public array $translatedAttributes = [
        'title',
        'description',
    ];

    /**
     * @var string[]
     */
    protected $fillable = [
        'sort',
        'url',
    ];

    /**
     * image data
     * $imageWith -with image crop
     * $imageHeight - height image crop
     * $imageCollectionName - image collection name
     * $noImage - url on image photo (no image)
     * */
    private static int $imageWith = 1440;

    private static int $imageHeight = 566;

    private static string $imageCollectionName = 'slider';

    private static string $noImage = '/img/slider.png';

    protected $appends = [
        'img_jpg',
        'img_web',
        'preview',
        'created_format',
    ];
}
