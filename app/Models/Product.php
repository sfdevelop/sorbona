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
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\MediaLibrary\HasMedia;

#[ObservedBy([ProductObserver::class])]
class Product extends Model implements HasMedia, TranslatableContract
{
    use CreatedFormatTrait;
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

    protected $with = ['media','currency'];

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
        'currency_id',
        'manufacturer_id',
        'sku',
        'price',
        'sale',
        'priceTen',
        'priceTwenty',
        'sort',

        'is_public',
        'is_new',
        'is_top',
        'in_stock',

        'qtyMilkoopt',
        'qtyOpt',
    ];

    protected $casts = [
        'is_public' => 'boolean',
        'is_new' => 'boolean',
        'is_top' => 'boolean',
        'in_stock' => 'boolean',
    ];

    /**
     * image data
     * $imageWith -with image crop
     * $imageHeight - height image crop
     * $imageCollectionName - image collection name
     * $noImage - url on image photo (no image)
     * */
    private static int $imageWith = 1060;

    private static int $imageHeight = 1000;

    private static string $imageCollectionName = 'product';

    private static string $noImage = '/img/product.png';

    protected $appends = [
        'img_jpg',
        'img_web',
        'preview',
        'created_format',
        'now_price',
        'price_from_ten',
        'price_from_twenty',
        'short_description',
    ];


    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class)->withTranslation();
    }

    public function manufacturer()
    {
        return $this->belongsTo(Manufacturer::class)->withTranslation();
    }

    /**
     * @return BelongsTo
     * @property-read
     */
    public function currency(): BelongsTo
    {
        return $this->belongsTo(Currency::class)->select(['id', 'title', 'currency' ]);
    }

    public function filterValues(): BelongsToMany
    {
        return $this->belongsToMany(FilterValue::class, 'product_filter_value');
    }

    protected function shortDescription(): Attribute
    {
        return Attribute::make(
            get: function ($value) {
                return shortDescription($this->description);
            },
        );
    }

}
