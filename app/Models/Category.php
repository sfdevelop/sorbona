<?php

namespace App\Models;

use App\Models\Traits\CreatedFormatTrait;
use App\Models\Traits\Filterable;
use App\Models\Traits\RegisterMediaTrait;
use App\Models\Traits\SlugGableTrait;
use App\Models\Traits\TranslateScopeTrait;
use App\Observers\CategoryObserver;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\MediaLibrary\HasMedia;

#[ObservedBy([CategoryObserver::class])]
class Category extends Model implements HasMedia, TranslatableContract
{
    use CreatedFormatTrait;
    use Filterable;
    use HasFactory;
    use RegisterMediaTrait;
    use SlugGableTrait;
    use Translatable;
    use TranslateScopeTrait;

    protected $table = 'categories';

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
        'category_id',
        'sort',
        'in_main',
        'is_public',
        'slug',
    ];

    protected $casts = [
        'in_main' => 'boolean',
        'is_public' => 'boolean',
    ];

    /**
     * image data
     * $imageWith -with image crop
     * $imageHeight - height image crop
     * $imageCollectionName - image collection name
     * $noImage - url on image photo (no image)
     * */
    private static int $imageWith = 100;

    private static int $imageHeight = 100;

    private static string $imageCollectionName = 'category';

    private static string $noImage = '/img/category.png';

    protected $appends = [
        'img_jpg',
        'img_web',
        'preview',
        'created_format',
    ];

    public function products(): HasMany
    {
        return $this->hasMany(Product::class)->withTranslation();
    }

    public function categories(): HasMany
    {
        return $this->hasMany(Category::class)->withTranslation();
    }

    public function childrenCategories(): HasMany
    {
        return $this->hasMany(Category::class)->with('categories')->withTranslation()->orderBy('sort');
    }

    public function parentCategory(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id')->withTranslation();
    }
}
