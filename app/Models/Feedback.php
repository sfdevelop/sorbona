<?php

namespace App\Models;

use App\Events\FeedbackMailEvent;
use App\Models\Traits\CreatedFormatTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use CreatedFormatTrait;
    use HasFactory;

    protected $table = 'feedback';

    protected $perPage = 20;

    protected $guarded = false;

    protected $dispatchesEvents = [
        'created' => FeedbackMailEvent::class,
    ];
}
