<?php

namespace App\Models;

use App\Models\Traits\CreatedFormatTrait;
use App\Models\Traits\TranslateScopeTrait;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Color extends Model implements TranslatableContract
{
    use CreatedFormatTrait;
    use HasFactory;
    use Translatable;
    use TranslateScopeTrait;

    protected $table = 'colors';

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
        'id',
    ];

    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class)->withTranslation();
    }
}