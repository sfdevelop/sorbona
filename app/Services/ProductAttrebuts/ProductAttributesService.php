<?php

namespace App\Services\ProductAttrebuts;

use App\Models\Color;
use App\Models\Size;
use Illuminate\Database\Eloquent\Collection;

class ProductAttributesService implements ProductAttributesServiceInterface
{
    public function getArrayColorsAttr(array|Collection $colorsArray = []): array
    {
        return $this->getArrayAttributes($colorsArray, Color::class);
    }

    public function getArraySizesAttr(array|Collection $sizesArray): array
    {
        return $this->getArrayAttributes($sizesArray, Size::class);
    }

    /**
     * @param  array  $attributesArray
     * @param  string  $modelClass
     * @return array
     */
    private function getArrayAttributes(array $attributesArray, string $modelClass): array
    {
        $attributeIds = array_keys($attributesArray);
        $attributesCollection = $modelClass::trans()->whereIn('id', $attributeIds)->get();

        // Створюємо асоціативний масив, де ключами будуть id, а значеннями - title
        $attributes = [];
        foreach ($attributesCollection as $attribute) {
            $attributes[$attribute->id] = $attribute->title;
        }

        // Створюємо новий масив, де ключами будуть назви атрибутів, а значеннями - відповідні значення
        $result = [];
        foreach ($attributesArray as $id => $value) {
            if (isset($attributes[$id])) {
                $result[$attributes[$id]] = $value;
            }
        }

        return $result;
    }
}
