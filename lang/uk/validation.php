<?php

/*
|--------------------------------------------------------------------------
| Validation Language Lines
|--------------------------------------------------------------------------
|
| The following language lines contain the default error messages used by
| the validator class. Some of these rules have multiple versions such
| as the size rules. Feel free to tweak each of these messages here.
|
*/

return [
    'accepted' => 'Ви повинні прийняти :attribute.',
    'accepted_if' => 'Поле :attribute має бути прийнято, коли :other відповідає :value.',
    'active_url' => 'Поле :attribute містить недійсний URL.',
    'after' => 'У полі :attribute має бути дата більша за :date.',
    'after_or_equal' => 'У полі :attribute має бути дата більша або дорівнювати :date.',
    'alpha' => 'Поле :attribute може містити тільки букви.',
    'alpha_dash' => 'Поле :attribute може містити тільки букви, цифри, дефіс і нижнє підкреслення.',
    'alpha_num' => 'Поле :attribute може містити тільки букви та цифри.',
    'array' => 'Поле :attribute має бути масивом.',
    'attached' => 'Поле :attribute вже прикріплено.',
    'before' => 'У полі :attribute має бути дата раніше :date.',
    'before_or_equal' => 'У полі :attribute має бути дата раніше або дорівнювати :date.',
    'between' => [
        'array' => 'Кількість елементів у полі :attribute має бути між :min і :max.',
        'file' => 'Розмір файлу в полі :attribute має бути між :min і :max Кілобайт(а).',
        'numeric' => 'Поле :attribute має бути між :min і :max.',
        'string' => 'Кількість символів у полі :attribute має бути між :min і :max.',
    ],
    'boolean' => 'Поле :attribute повинно мати значення логічного типу.',
    'confirmed' => 'Поле :attribute не збігається з підтвердженням.',
    'current_password' => 'Поле :attribute містить некоректний пароль.',
    'date' => 'Поле :attribute не є датою.',
    'date_equals' => 'Поле :attribute має бути датою, що дорівнює :date.',
    'date_format' => 'Поле :attribute не відповідає формату :format.',
    'different' => 'Поля :attribute і :other повинні відрізнятися.',
    'digits' => 'Довжина цифрового поля :attribute має бути :digits.',
    'digits_between' => 'Довжина цифрового поля :attribute має бути між :min і :max.',
    'dimensions' => 'Поле :attribute має неприпустимі розміри зображення.',
    'distinct' => 'Поле :attribute містить повторюване значення.',
    'email' => 'Поле :attribute має бути дійсною електронною адресою.',
    'ends_with' => 'Поле :attribute повинно закінчуватися одним із таких значень: :values',
    'exists' => 'Обране значення для :attribute некоректне.',
    'file' => 'Поле :attribute має бути файлом.',
    'filled' => 'Поле :attribute обов\'язкове для заповнення.',
    'gt' => [
        'array' => 'Кількість елементів у полі :attribute має бути більшою за :value.',
        'file' => 'Розмір файлу в полі :attribute має бути більшим за :value Кілобайт(а).',
        'numeric' => 'Поле :attribute має бути більше :value.',
        'string' => 'Кількість символів у полі :attribute має бути більшою за :value.',
    ],
    'gte' => [
        'array' => 'Кількість елементів у полі :attribute має бути :value або більше.',
        'file' => 'Розмір файлу в полі :attribute має бути :value Кілобайт(а) або більше.',
        'numeric' => 'Поле :attribute має бути :value або більше.',
        'string' => 'Кількість символів у полі :attribute має бути :value або більше.',
    ],
    'image' => 'Поле :attribute має бути зображенням.',
    'in' => 'Обране значення для :attribute помилкове.',
    'in_array' => 'Поле :attribute не існує в :other.',
    'integer' => 'Поле :attribute має бути цілим числом.',
    'ip' => 'Поле :attribute має бути дійсною IP-адресою.',
    'ipv4' => 'Поле :attribute має бути дійсною IPv4-адресою.',
    'ipv6' => 'Поле :attribute має бути дійсною IPv6-адресою.',
    'json' => 'Поле :attribute має бути JSON рядком.',
    'lt' => [
        'array' => 'Кількість елементів у полі :attribute має бути меншою за :value.',
        'file' => 'Розмір файлу в полі :attribute має бути менше :value Кілобайт(а).',
        'numeric' => 'Поле :attribute має бути менше :value.',
        'string' => 'Кількість символів у полі :attribute має бути меншою за :value.',
    ],
    'lte' => [
        'array' => 'Кількість елементів у полі :attribute має бути :value або менше.',
        'file' => 'Розмір файлу в полі :attribute має бути :value Кілобайт(а) або менше.',
        'numeric' => 'Поле :attribute має бути :value або менше.',
        'string' => 'Кількість символів у полі :attribute має бути :value або менше.',
    ],
    'max' => [
        'array' => 'Кількість елементів у полі :attribute не може перевищувати :max.',
        'file' => 'Розмір файлу в полі :attribute не може бути більшим за :max Кілобайт(а).',
        'numeric' => 'Поле :attribute не може бути більшим за :max.',
        'string' => 'Кількість символів у полі :attribute не може перевищувати :max.',
    ],
    'mimes' => 'Поле :attribute має бути файлом одного з таких типів: :values.',
    'mimetypes' => 'Поле :attribute має бути файлом одного з таких типів: :values.',
    'min' => [
        'array' => 'Кількість елементів у полі :attribute має бути не меншою за :min.',
        'file' => 'Розмір файлу в полі :attribute має бути не менше :min Кілобайт(а).',
        'numeric' => 'Поле :attribute має бути не менше :min.',
        'string' => 'Кількість символів у полі :attribute має бути не менше :min.',
    ],
    'multiple_of' => 'Значення поля :attribute має бути кратним :value',
    'not_in' => 'Обране значення для :attribute помилкове.',
    'not_regex' => 'Обраний формат для :attribute помилковий.',
    'numeric' => 'Поле :attribute має бути числом. Так само роздільник має бути крапкою',
    'password' => 'Невірний пароль.',
    'present' => 'Поле :attribute має бути присутнім.',
    'prohibited' => 'Поле :attribute заборонено.',
    'prohibited_if' => 'Поле :attribute заборонено, коли :other дорівнює :value.',
    'prohibited_unless' => 'Поле :attribute заборонене, якщо :other не входить до :values.',
    'regex' => 'Поле :attribute має помилковий формат.',
    'relatable' => 'Поле :attribute не може бути пов\'язане з цим ресурсом.',
    'required' => 'Поле :attribute обов\'язкове для заповнення.',
    'required_if' => 'Поле :attribute обов\'язкове для заповнення, коли :other дорівнює :value.',
    'required_unless' => 'Поле :attribute обов\'язкове для заповнення, коли :other не дорівнює :values.',
    'required_with' => 'Поле :attribute обов\'язкове для заповнення, коли :values вказано.',
    'required_with_all' => 'Поле :attribute обов\'язкове для заповнення, коли :values вказано.',
    'required_without' => 'Поле :attribute обов\'язкове для заповнення, коли :values не вказано.',
    'required_without_all' => 'Поле :attribute обов\'язкове для заповнення, коли жодне з :values не вказано.',
    'same' => 'Значення полів :attribute і :other повинні збігатися.',
    'size' => [
        'array' => 'Кількість елементів у полі :attribute має дорівнювати :size.',
        'file' => 'Розмір файлу в полі :attribute має дорівнювати :size Кілобайт(а).',
        'numeric' => 'Поле :attribute має дорівнювати :size.',
        'string' => 'Кількість символів у полі :attribute має дорівнювати :size.',
    ],
    'starts_with' => 'Поле :attribute має починатися з одного з таких значень: :values',
    'string' => 'Поле :attribute має бути рядком.',
    'timezone' => 'Поле :attribute має бути дійсним часовим поясом.',
    'unique' => 'Таке значення поля :attribute вже існує.',
    'uploaded' => 'Завантаження поля :attribute не вдалося.',
    'url' => 'Поле :attribute має помилковий формат URL.',
    'uuid' => 'Поле :attribute має бути коректним UUID.',
    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],
    'attributes' => [
        'address' => 'Адреса',
        'age' => 'Вік',
        'available' => 'Доступно',
        'city' => 'Місто',
        'content' => 'Контент',
        'country' => 'Країна',
        'current_password' => 'Поточний пароль',
        'date' => 'Дата',
        'day' => 'День',
        'description' => 'Опис',
        'email' => 'E-Mail адреса',
        'excerpt' => 'Витяг',
        'first_name' => 'Ім\'я',
        'gender' => 'Стать',
        'hour' => 'Час',
        'last_name' => 'Прізвище',
        'minute' => 'Хвилина',
        'mobile' => 'Моб. номер',
        'month' => 'Місяць',
        'name' => 'Ім\'я',
        'password' => 'Пароль',
        'password_confirmation' => 'Підтвердження пароля',
        'phone' => 'Телефон',
        'second' => 'Секунда',
        'sex' => 'Стать',
        'size' => 'Розмір',
        'time' => 'Час',
        'title' => 'Найменування',
        'username' => 'Нікнейм',
        //        'year' => 'Рік',
        'question' => 'Ваше запитання',
        'mail' => 'Пошта',
        'text' => 'Ваше повідомлення',
        'portion_id' => 'Розділ',
        'category_id' => 'Категорія',
        'subcategory_id' => 'Підкатегорія',
        'type_id' => 'Вид оголошення',
        'countries_id' => 'Країна',
        'regions_id' => 'Область',
        'cities_id' => 'Місто',
        'viber' => 'Viber',
        'telegram' => 'Telegram',
        'whatApp' => 'whatApp',
        'phone2' => 'Телефон',
        'currency_id' => 'Валюта',
        'link' => 'Посилання',
        'value' => 'Значення',
        'sort' => 'Сортування',
        'file' => 'Зображення',
        'job' => 'Посада',
        //        'years' => 'Рік',
        'title_two' => 'Назва',
        'description_two' => 'Опис',
        'contacts' => 'Розділ контактів',
        'leftBlock' => 'Лівий блок',
        'rightBlock' => 'Правий блок',
        'rating' => 'Рейтинг',
        'comment' => 'Коментар',
        'client' => 'Кількість Задоволених клієнтів',
        'conversion' => '% Збільшення конверсії продажів',

        'facebook' => 'facebook',
        'instagram' => 'instagram',
        'phone3' => 'Телефон',
        'phone4' => 'Телефон',
        'work' => 'Робочі дні',
        'weekend' => 'Вихідні дні',
        'map' => 'Карта',
        'category_photo_id' => 'Категорія для фото',
        'quote' => 'Цитата',
        'price' => 'Ціна',
        'newPrice' => 'Нова ціна',
        'colorPrice' => '+ До ціни',
        'sku' => 'Артикул',

        'titleSectionAboutUs' => 'Заголовок основної секції',
        'titleDownAboutUs' => 'Заголовок внизу сторінки',
        'descriptionRememberAboutUs' => 'Текст  обовязковий',
        'textFeedBackAboutUs' => 'Текст звяжіться з нами',

        'old_password' => 'Поточний пароль',

        'all_title' => 'Повна назва',
        'specialization' => 'Спеціалізація',
        'flat' => 'Штаб-квартира',
        'year' => 'Рік заснування',

        'descriptionShort' => 'Короткий опис',
        'notoriety' => 'Відомий',
        'assortment' => 'Асортимент',
        'cooperate' => 'Співпраця',
        'comfort' => 'Зручність',
        'filter_id' => 'Фільтр',
        'value_id' => 'Значення',
        'qtyMilkoopt' => 'Кількість мілокоопт',
        'qtyOpt' => 'Кількість опт',
    ],
];
