<?php

namespace App\Models\Traits;

use Cviebrock\EloquentSluggable\Sluggable;

trait SlugGableTrait
{
    use Sluggable;

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title:ru',
            ],
        ];
    }
}
