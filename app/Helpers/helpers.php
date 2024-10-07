<?php

use App\Enum\StatusPaymentEnum;

if (! function_exists('shortDescription')) {
    function shortDescription(string $str, int $count = 50): string
    {
        if ($count < 0) {
            return '';
        }

        $str = \Illuminate\Support\Str::words(strip_tags($str), $count, '...');

        return html_entity_decode($str);
    }
}

if (! function_exists('countWord')) {
    function countWord(string $str, int $maxCount): bool
    {
        $count = str_word_count($str, 0, 'АБВГДЕЁЖЗИЙКЛМНОПРСТУФХЦЧШЩЪЫЬЭЮЯабвгдеёжзийклмнопрстуфхцчшщъыьэюя');

        return $count > $maxCount;
    }
}

if (! function_exists('currencyUAH')) {
    function currencyUAH(string $price): bool|string
    {
        return Number::currency($price, in: 'EUR', locale: 'lt');
    }
}

if (! function_exists('isIdInArray')) {
    function isIdInArray($request, int $id): bool
    {
        //        $request = request()->query('colors');

        if ($request) {
            // Розділяємо значення на масив
            $colorsArray = explode(',', $request);

            // Перетворюємо значення в масиві на цілі числа
            $colorsArray = array_map('intval', $colorsArray);

            // Перевіряємо чи є значення 10 в масиві
            return in_array($id, $colorsArray);
        }

        return false;
    }
}

if (! function_exists('getAvatar')) {
    function getAvatar(string $name): string
    {
        return \Avatar::create($name)->setBackground('#1a1a1a')->toSvg();
    }
}

/**
 * Преобразование в float и убираем значек гривні
 */
if (! function_exists('strPriceToFloat')) {
    function strPriceToFloat(string $inputString): float
    {
        $cleanedString = preg_replace('/[^\d,]/u', '', $inputString);

        // Замінити кому на крапку
        $cleanedString = str_replace(',', '.', $cleanedString);

        // Перетворити на число з плаваючою комою
        // Вивести результат
        return floatval($cleanedString);
    }
}

/**
 * Переводимо статус оплати
 */
if (! function_exists('translatePaymentPaid')) {
    function translatePaymentPaid(StatusPaymentEnum $paidName): string
    {
        return match ($paidName) {
            StatusPaymentEnum::NO_SUCCESS => __('front.noPaid'),
            StatusPaymentEnum::SUCCESS => __('front.paid'),
            default => 'payment status is unknown',
        };
    }
}

/**
 * Переводимо статус оплати
 */
if (! function_exists('translatePayment')) {
    function translatePayment(string $paymentName): string
    {
        return match ($paymentName) {
            'LiqPay' => __('LiqPay'),
            default => __('front.payment_made'),
        };
    }
}

/**
 * Клас кнопки статусу замовлення та перевод
 */
if (! function_exists('getClassAndTitleStatusOrder')) {
    function getClassAndTitleStatusOrder(\App\Enum\StatusOrderEnum $title): string
    {
        $result = match ($title) {
            \App\Enum\StatusOrderEnum::CANCELED => ['title' => __('front.canceled'), 'class' => 'status-canceled'],
            \App\Enum\StatusOrderEnum::COMPLETED => ['title' => __('front.completed'), 'class' => 'status-completed'],
            default => ['title' => __('front.new'), 'class' => 'status-new'],
        };

        return '<span class="'.$result['class'].'">'.$result['title'].'</span>';
    }
}

/**
 * Переводим способы доставки
 */
if (! function_exists('translateDelivery')) {
    function translateDelivery(string $delivery): string
    {
        $deliveryTranslations = [
            'novaPochtaState' => 'Доставка у відділення Нової Пошти',
            'novaPochtaPoshtomat' => 'Доставка у поштомат Нової Пошти',
            'novaPochtaKurer' => 'Кур\'єрська доставка  Нової Пошти',
        ];

        return $deliveryTranslations[$delivery] ?? $delivery;
    }
}

/**
 * Переклад для адмінки статусів замовлення
 */
if (! function_exists('getClassAndTitleStatusOrderFromAdmin')) {
    function getClassAndTitleStatusOrderFromAdmin($title): string
    {
        return match ($title) {
            \App\Enum\StatusOrderEnum::CANCELED => __('front.canceled'),
            \App\Enum\StatusOrderEnum::COMPLETED => __('front.completed'),
            default => __('front.new'),
        };
    }
}
