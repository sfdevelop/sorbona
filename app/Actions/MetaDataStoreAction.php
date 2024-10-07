<?php

namespace App\Actions;

use Lorisleiva\Actions\Concerns\AsAction;

class MetaDataStoreAction
{
    use AsAction;

    public function handle(object $model, $request): void
    {
        $langArray = config('translatable.locales');

        if ($request) {
            $model->metadata()->updateOrCreate(
                [
                    'metadataable_type' => get_class($model),
                ],
                $request->only($langArray)
            );
        }
    }
}
