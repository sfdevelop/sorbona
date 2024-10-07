<?php

namespace App\Repository\Page;

use App\Models\Page;

class PageRepository implements PageRepositoryInterface
{
    /**
     * @param  int  $id
     * @return Page
     */
    public function getPageFromId(int $id): Page
    {
        return Page::query()
            ->trans()
            ->find($id);
    }
}
