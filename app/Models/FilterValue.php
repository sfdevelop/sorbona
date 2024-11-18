<?php

namespace App\Models;

use App\Models\Traits\CreatedFormatTrait;
use App\Models\Traits\TranslateScopeTrait;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FilterValue extends Model implements TranslatableContract
{
    use HasFactory;
    use Translatable;
    use CreatedFormatTrait;
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
