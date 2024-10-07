<?php

namespace App\Http\Controllers\Traits;

trait AdminImagesTraits
{
    /**
     * @param  $files
     * @param  object  $model
     * @return void
     */
    public function MultiUpdateAdminImages($files, object $model): void
    {
        if ($files) {
            foreach ($files as $file) {
                $model->addMedia($file)->toMediaCollection($this->nameImageCollection);
            }
        }
    }

    /**
     * @param  $request
     * @return void
     */
    public function deleteImage($request): void
    {
        if ($request->exists('deleteImage')) {
            foreach ($request->deleteImage as $deleteId) {
                \Spatie\MediaLibrary\MediaCollections\Models\Media::findOrFail($deleteId)->delete();
            }
        }
    }
}
