<?php

namespace App\Models;

use App\Models\Traits\CreatedFormatTrait;
use App\Models\Traits\SlugGableTrait;
use App\Models\Traits\TranslateScopeTrait;
use App\Observers\FilterValueObserver;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[ObservedBy([FilterValueObserver::class])]
class FilterValue extends Model implements TranslatableContract
{
    use CreatedFormatTrait;
    use HasFactory;
    use SlugGableTrait;
    use Translatable;
    use TranslateScopeTrait;

    protected $table = 'filter_values';

    protected $perPage = 20;

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

    public function filter(): BelongsTo
    {
        return $this->belongsTo(Filter::class)->withTranslation();
    }
}
