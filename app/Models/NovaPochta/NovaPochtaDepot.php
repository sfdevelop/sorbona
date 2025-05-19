<?php

namespace App\Models\NovaPochta;

use Illuminate\Database\Eloquent\Model;

class NovaPochtaDepot extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'ref',
        'city_ref',
        'name_ru',
        'name_uk',
        'depot_number',
        'is_pochtomat'
    ];

    public function getNameAttribute()
    {
        $locale = app()->getLocale() == 'uk' ? 'uk' : app()->getLocale();
        return $locale == 'uk' ? ($this->name_uk ? $this->name_uk : $this->name_ru) : ($this->name_ru ? $this->name_ru : $this->name_uk);
    }

}
