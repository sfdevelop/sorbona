<?php

namespace App\Services\SEOCrud;

class CrudSeoService implements CrudSeoServiceInterface
{
    public function CreateOrUpdateSeoMetadata($request, $model): void
    {
        foreach (config('translatable.locales') as $key => $locale) {
            $verificationCondition = $this->getSEO($request, $locale);

            if ($verificationCondition) {
                $this->crudModel($request, $model);
            }
        }
    }

    /**
     * @param  $request
     * @param  string  $lang
     * @return bool
     */
    private function getSEO($request, string $lang): bool
    {
        if ($request["$lang.title_seo"] or $request["$lang.description_seo"]) {
            return true;
        }

        return false;
    }

    /**
     * @param  $request
     * @param  $model
     * @return void
     */
    private function crudModel($request, $model): void
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
