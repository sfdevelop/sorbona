<?php

namespace App\Models;

use App\Models\Traits\CreatedFormatTrait;
use App\Models\Traits\SlugGableTrait;
use App\Models\Traits\TranslateScopeTrait;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Filter extends Model implements TranslatableContract
{
    use CreatedFormatTrait;
    use HasFactory;
    use SlugGableTrait;
    use Translatable;
    use TranslateScopeTrait;

    protected $table = 'filters';

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
        'slug',
        'sort',
        'numeric',
    ];

    protected $casts = [
        'numeric' => 'boolean',
    ];

    public function filterValues(): HasMany
    {
        return $this->hasMany(FilterValue::class);
    }
}
