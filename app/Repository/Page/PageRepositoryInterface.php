<?php

namespace App\Repository\Page;

use App\Models\Page;

interface PageRepositoryInterface
{
    public function getPageFromId(int $id): Page;
}
