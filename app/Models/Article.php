<?php

namespace App\Models;

use App\Models\Traits\CreatedFormatTrait;
use App\Models\Traits\MetaDataPolymorphic;
use App\Models\Traits\RegisterMediaTrait;
use App\Models\Traits\TranslateScopeTrait;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use App\Models\Traits\SlugGableTrait;
use Astrotomic\Translatable\Translatable;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;

/**
 * @property int title
 * @property int description
 */
class Article extends Model implements TranslatableContract, HasMedia
{
    use HasFactory;
    use SlugGableTrait;
    use Translatable;
    use RegisterMediaTrait;
    use CreatedFormatTrait;
    use MetaDataPolymorphic;
    use TranslateScopeTrait;

    protected $table = 'articles';
    protected $perPage = 20;
    protected $with = 'media';

    /**
     * @var string[]
     */
    public array $translatedAttributes = [
        'title',
        'description',
    ];

    /**
     * @var string[]
     */
    protected $fillable = [
        'slug',
        'sort',
    ];

    /**
     * image data
     * $imageWith -with image crop
     * $imageHeight - height image crop
     * $imageCollectionName - image collection name
     * $noImage - url on image photo (no image)
     * */
    private static int $imageWith = 1540;
    private static int $imageHeight = 800;
    private static string $imageCollectionName = 'article';
    private static string $noImage = '/img/article.png';

    protected $appends = [
        'img_jpg',
        'img_web',
        'img_article',
        'preview',
        'created_format',
    ];
}
