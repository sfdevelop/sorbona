<?php

namespace App\Enum;

enum TypeNotification: string
{
    case CONTACT = 'contact';
    case LESSON = 'lesson';
    case COURSE = 'course';
    case CALL = 'call';
    case RECEIPT = 'receipt';
}
