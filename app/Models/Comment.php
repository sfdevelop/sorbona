<?php

namespace App\Models;

use App\Models\Traits\CreatedFormatTrait;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use CreatedFormatTrait;

    protected $table = 'comments';

    protected $perPage = 20;

    protected $fillable = [
        'product_id',
        'user_id',
        'name',
        'text',
        'is_public',
    ];

    protected $casts = [
        'is_public' => 'boolean',
    ];

    /**
     * @return mixed
     */
    public function product(): mixed
    {
        return $this->belongsTo(Product::class)->withTranslation();
    }

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function scopePublic(Builder $query): Builder
    {
        return $query->where('is_public', true);
    }
}
