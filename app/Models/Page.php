<?php

namespace App\Models;

use App\Models\Traits\CreatedFormatTrait;
use App\Models\Traits\MetaDataPolymorphic;
use App\Models\Traits\RegisterMediaTrait;
use App\Models\Traits\SlugGableTrait;
use App\Models\Traits\TranslateScopeTrait;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;

class Page extends Model implements HasMedia, TranslatableContract
{
    use CreatedFormatTrait;
    use HasFactory;
    use MetaDataPolymorphic;
    use RegisterMediaTrait;
    use SlugGableTrait;
    use Translatable;
    use TranslateScopeTrait;

    protected $table = 'pages';

    protected $perPage = 20;

    protected $with = 'media';

    /**
     * @var array|string[]
     */
    public array $translatedAttributes = [
        'title',
        'description',
        'titleSectionAboutUs',
        'titleDownAboutUs',
        'descriptionRememberAboutUs',
        'textFeedBackAboutUs',
    ];

    //        /**
    //         * @var string[]
    //         */
    //        protected $fillable = [
    //            '',
    //        ];

    /**
     * image data
     * $imageWith -with image crop
     * $imageHeight - height image crop
     * $imageCollectionName - image collection name
     * $noImage - url on image photo (no image)
     * */
    private static int $imageWith = 625;

    private static int $imageHeight = 770;

    private static string $imageCollectionName = 'aboutMain';

    private static string $noImage = '/img/aboutMain.png';

    protected $appends = [
        'img_jpg',
        'img_web',
        'img_main',
        'preview',
        'created_format',
    ];
}
