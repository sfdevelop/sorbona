<?php

namespace App\Models\Traits;

use App\Models\Article;
use App\Models\Page;
use App\Models\Product;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\InteractsWithMedia;

trait RegisterMediaTrait
{
    use InteractsWithMedia;

    public function registerMediaCollections(): void
    {
        $this
            ->addMediaCollection(self::$imageCollectionName)
            ->useFallbackUrl(self::$noImage)
            ->useFallbackPath(public_path(self::$noImage))
            ->singleFile();

        $this
            ->addMediaConversion('preview')
            ->fit(Manipulations::FIT_CROP, 500, 500)
            ->nonQueued();

        $this
            ->addMediaConversion('thumb')
            ->fit('crop', self::$imageWith, self::$imageHeight)
            ->nonQueued();

        $this->addMediaConversion('thumb-p')
            ->format('webp')
            ->fit('crop', self::$imageWith, self::$imageHeight)
            ->nonQueued();

        if ($this instanceof Page) {
            $this->addMediaConversion('main-thump-p')
                ->format('webp')
                ->fit('crop', 630, 940)
                ->nonQueued();
        }

        //        if ($this instanceof Article) {
        //            $this->addMediaConversion('article-thump-p')
        //                ->format('webp')
        //                ->fit('crop', '268', '182')
        //                ->nonQueued();
        //        }

        if ($this instanceof Product) {
            $this->addMediaConversion('additional')
//                ->format('webp')
                ->fit('crop', 800, 733)
                ->nonQueued();

            $this
                ->addMediaConversion('preview_web')
                ->format('webp')
                ->fit(Manipulations::FIT_CROP, 240, 263)
                ->nonQueued();
        }
    }

    /**
     * @return Attribute
     */
    public function imgJpg(): Attribute
    {
        return new Attribute(
            get: fn () => $this->getFirstMediaUrl(self::$imageCollectionName, 'thumb')
        );
    }

    /**
     * @return Attribute
     */
    public function imgOriginal(): Attribute
    {
        return new Attribute(
            get: fn () => $this->getFirstMediaUrl(self::$imageCollectionName)
        );
    }

    /**
     * @return Attribute
     */
    public function preview(): Attribute
    {
        return new Attribute(
            get: fn () => $this->getFirstMediaUrl(self::$imageCollectionName, 'preview')
        );
    }

    /**
     * @return Attribute
     */
    public function imgWeb(): Attribute
    {
        return new Attribute(
            get: fn () => $this->getFirstMediaUrl(self::$imageCollectionName, 'thumb-p')
        );
    }

    /**
     * @return Attribute
     */
    public function imgMain(): Attribute
    {
        return new Attribute(
            get: fn () => $this->getFirstMediaUrl('aboutPagePhoto', 'main-thump-p')
        );
    }
    //
    //    /**
    //     * @return Attribute
    //     */
    //    public function imgArticle(): Attribute
    //    {
    //        return new Attribute(
    //            get: fn() => $this->getFirstMediaUrl(self::$imageCollectionName, 'article-thump-p')
    //        );
    //    }

    /**
     * @return Attribute
     */
    public function manyWeb(): Attribute
    {
        return new Attribute(
            get: fn () => $this->getFirstMediaUrl('additional_photo', 'manyWeb')
        );
    }

    /**
     * @return Attribute
     */
    public function additionalWeb(): Attribute
    {
        return new Attribute(
            get: fn () => $this->getFirstMediaUrl('additional_photo_product', 'additional')
        );
    }
}
