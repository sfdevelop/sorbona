<?php

namespace App\Enum;

enum StatusOrderEnum: string
{
    case COMPLETED = 'Completed';
    case NEW = 'New';
    case CANCELED = 'Canceled';
}
