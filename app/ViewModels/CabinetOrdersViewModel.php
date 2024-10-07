<?php

namespace App\ViewModels;

class CabinetOrdersViewModel extends BaseViewModel
{
    public function __construct(

    ) {}

    public function orders()
    {
        $result = \Auth::user()->orders;

        return $result->reverse()->paginate();
    }
}
