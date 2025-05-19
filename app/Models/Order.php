<?php

namespace App\Models;

use App\Enum\StatusOrderEnum;
use App\Enum\StatusPaymentEnum;
use App\Models\Traits\CreatedFormatTrait;
use App\Observers\OrderObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;

#[ObservedBy([OrderObserver::class])]
class Order extends Model
{
    use CreatedFormatTrait;
    use HasFactory;
    use Notifiable;

    protected $table = 'orders';

    protected $fillable = [
        'name',
        'phone',
        'email',
        'deliveryTitle',
        'delivery',
        'payment',
        'comment',
        'total',
        'statusPay',
        'deliveryCheck',
        'user_id',
        'statusOrder',
    ];

    protected $casts = [
//        'uuid' => 'uuid',
        'delivery' => 'array',
        'statusPay' => StatusPaymentEnum::class,
        'statusOrder' => StatusOrderEnum::class,
    ];

    protected $appends = [

        'created_format',
    ];

    /**
     * @return HasMany
     */
    public function orderItems(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }

    /**
     * @param  $notification
     * @return mixed|string
     */
    public function routeNotificationForMail($notification): mixed
    {
        return $this->email; // Повертаємо електронну пошту замовлення для відправки сповіщення
    }

    protected static function boot(): void
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->uuid)) {
                $model->uuid = (string) Str::uuid();
            }
        });
    }
}
