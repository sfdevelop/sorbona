<?php

namespace App\Services\SEOCrud;

interface CrudSeoServiceInterface
{
    public function CreateOrUpdateSeoMetadata($request, $model);
}
