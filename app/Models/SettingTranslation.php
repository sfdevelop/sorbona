<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SettingTranslation extends Model
{
    protected $table = 'setting_translations';

    public $timestamps = false;

    protected $fillable = [
        'address',
        'cooperate',
        'textForMail',
        'default_address',
        'default_time_work',
    ];
}
