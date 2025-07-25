<?php

namespace App\ViewModels;

use App\Http\Controllers\Traits\CustomSeoTrait;
use App\Models\Order;
use App\Repository\Benefits\BenefitRepositoryInterface;
use App\Repository\Manufacture\ManufactureRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class CartThxViewModel extends BaseViewModel
{
    use CustomSeoTrait;

    public function __construct(public Order $order) {}

    public function deliveryAddress(): string
    {
        $fields = ['city', 'region', 'address'];

        return collect($fields)
            ->map(fn($field) => $this->order->delivery[$field] ?? null)
            ->filter()
            ->join(', ');
    }
}
