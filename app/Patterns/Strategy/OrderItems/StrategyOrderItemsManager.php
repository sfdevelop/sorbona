<?php

namespace App\Patterns\Strategy\OrderItems;

use App\Patterns\Strategy\OrderItems\CartDetailsArrayConversion;

class StrategyOrderItemsManager
{
    /**
     * Converts input data into a uniform format using a specific strategy.
     *
     * @param  mixed  $inputData  The data to be transformed.
     * @return mixed The transformed data in a uniform format.
     *
     * @throws \InvalidArgumentException If the input data format is invalid.
     */
    public function makeItemsUniform(mixed $inputData): mixed
    {
        $strategy = match (true) {
            $inputData instanceof \Illuminate\Database\Eloquent\Collection => new ProductCollectionConversion,
            $inputData instanceof \Jackiedo\Cart\Details => new CartDetailsConversion,
            is_array($inputData) => new CartDetailsArrayConversion,
            default => throw new \InvalidArgumentException('Invalid data format'),
        };

        return $strategy->convert($inputData);
    }
}
