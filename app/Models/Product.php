<?php

namespace App\Models;

use App\Models\Traits\CreatedFormatTrait;
use App\Models\Traits\Filterable;
use App\Models\Traits\MetaDataPolymorphic;
use App\Models\Traits\ProductPriceTrait;
use App\Models\Traits\RegisterMediaTrait;
use App\Models\Traits\SlugGableTrait;
use App\Models\Traits\TranslateScopeTrait;
use App\Observers\ProductObserver;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\MediaLibrary\HasMedia;

#[ObservedBy([ProductObserver::class])]
class Product extends Model implements HasMedia, TranslatableContract
{
    use CreatedFormatTrait;
    use Filterable;
    use Filterable;
    use HasFactory;
    use MetaDataPolymorphic;
    use ProductPriceTrait;
    use RegisterMediaTrait;
    use SlugGableTrait;
    use Translatable;
    use TranslateScopeTrait;

    protected $table = 'products';

    protected $perPage = 20;

    protected $with = ['media'];

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
        'price',
        'newPrice',
        'sort',
        'colors',
        'colorsIds',
        'sizesIds',
        'sizes',
        'sku',
        'is_new',
        'is_bestseller',
    ];

    protected $casts = [
        'colors' => 'array',
        'colorsIds' => 'array',
        'sizes' => 'array',
        'sizesIds' => 'array',
        'is_new' => 'boolean',
        'is_bestseller' => 'boolean',
    ];

    /**
     * image data
     * $imageWith -with image crop
     * $imageHeight - height image crop
     * $imageCollectionName - image collection name
     * $noImage - url on image photo (no image)
     * */
    private static int $imageWith = 800;

    private static int $imageHeight = 600;

    private static string $imageCollectionName = 'product';

    private static string $noImage = '/img/product.png';

    protected $appends = [
        'img_jpg',
        'img_web',
        'preview',
        'created_format',
        'old_price',
        'now_price',
        //        'percent_sale',
        'short_description',
    ];

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class)->withTranslation();
    }

    /**
     * @return HasMany
     */
    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class)->public();
    }

    protected function shortDescription(): Attribute
    {
        return Attribute::make(
            get: function ($value) {
                return shortDescription($this->description);
            },
        );
    }

    public function productColors()
    {
        return $this->belongsToMany(Color::class, 'color_product')->withTranslation();
    }
}
