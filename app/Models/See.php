<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Prunable;

class See extends Model
{
    use HasFactory;
    use Prunable;

    protected $table = 'see';

    protected $perPage = 20;

    public function prunable(): Builder
    {
        return static::where('created_at', '<=', now()->subDays(3));
    }

    /**
     * @var string[]
     */
    protected $fillable = [
        'user_id',
        'product_id',
    ];
}
