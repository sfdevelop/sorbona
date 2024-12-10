<?php

namespace App\Observers;

use App\Models\FilterValue;

class FilterValueObserver
{
    /**
     * Handle the FilterValue "created" event.
     */
    public function created(FilterValue $filterValue): void
    {
        $filterValue->update(['sort' => $filterValue->id]);
    }

    /**
     * Handle the FilterValue "updated" event.
     */
    public function updated(FilterValue $filterValue): void
    {
        //
    }

    /**
     * Handle the FilterValue "deleted" event.
     */
    public function deleted(FilterValue $filterValue): void
    {
        //
    }

    /**
     * Handle the FilterValue "restored" event.
     */
    public function restored(FilterValue $filterValue): void
    {
        //
    }

    /**
     * Handle the FilterValue "force deleted" event.
     */
    public function forceDeleted(FilterValue $filterValue): void
    {
        //
    }
}
