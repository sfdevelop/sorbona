<?php

namespace App\Models\Traits;

use App\Models\Metadata;
use Illuminate\Database\Eloquent\Casts\Attribute;

trait MetaDataPolymorphic
{
    /**
     * @return mixed
     */
    public function metadata()
    {
        return $this->morphMany(Metadata::class, 'metadataable');
    }

    /**
     * @return Metadata|\Closure|null
     */
    public function getItemSeo(): Metadata|\Closure|null
    {
        return $this->metadata->first();
    }

    /**
     * @return Attribute
     * @return string
     */
    public function titleSeo(): Attribute
    {
        return new Attribute(
            get: fn () => $this->metadata->first()->title_seo ?? ''
        );
    }

    /**
     * @return Attribute
     * @return string
     */
    public function descriptionSeo(): Attribute
    {
        return new Attribute(
            get: fn () => $this->metadata->first()->description_seo ?? ''
        );
    }

    /**
     * @return void
     */
    protected static function boot(): void
    {
        parent::boot();
        static::deleting(function ($model) {
            $model->metadata()->delete();
        });
    }
}
