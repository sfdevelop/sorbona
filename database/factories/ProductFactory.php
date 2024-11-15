<?php

namespace Database\Factories;

use App\Facade\TranslateFacade;
use App\Models\Category;
use App\Models\Currency;
use App\Models\Manufacturer;
use Illuminate\Database\Eloquent\Factories\Factory;


class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $productNames = [
            'Змішувач для ванни Grohe',
            'Змішувач для кухні Hansgrohe',
            'Змішувач для умивальника Roca',
            'Змішувач для душу Kludi',
            'Змішувач з термостатом Oras',
            'Змішувач з висувним виливом Blanco',
            'Змішувач з сенсором Teka',
            'Змішувач з фільтром Franke',
            'Змішувач з підсвіткою Ideal Standard',
            'Змішувач з водоспадом Villeroy & Boch',
            'Умивальник настінний Cersanit',
            'Умивальник підвісний Duravit',
            'Умивальник вбудований Laufen',
            'Умивальник на стільницю Vitra',
            'Умивальник з п\'єдесталом Jika',
            'Умивальник з напівп\'єдесталом Geberit',
            'Умивальник з тумбою Ravak',
            'Умивальник з двома чашами Kolo',
            'Умивальник з підсвіткою Jacob Delafon',
            'Умивальник з дзеркалом RAVAK',
            'Ванна акрилова Kaldewei',
            'Ванна чавунна Roca',
            'Ванна сталева Bette',
            'Ванна кутова Riho',
            'Ванна овальна Villeroy & Boch',
            'Ванна прямокутна Duravit',
            'Ванна з гідромасажем Jacuzzi',
            'Ванна з підсвіткою Teuco',
            'Ванна з дверцятами Novellini',
            'Ванна з підголівником Ideal Standard',
            'Душова кабіна квадратна Huppe',
            'Душова кабіна прямокутна Kermi',
            'Душова кабіна кутова SanSwiss',
            'Душова кабіна з піддоном Radaway',
            'Душова кабіна без піддону Duscholux',
            'Душова кабіна з гідромасажем Aquaform',
            'Душова кабіна з парогенератором Eago',
            'Душова кабіна з підсвіткою Glass',
            'Душова кабіна з радіо Hoesch',
            'Душова кабіна з сидінням Ideal Standard',
            'Унітаз підвісний Villeroy & Boch',
            'Унітаз підлоговий Roca',
            'Унітаз компакт Cersanit',
            'Унітаз моноблок Laufen',
            'Унітаз з інсталяцією Geberit',
            'Унітаз з біде Duravit',
            'Унітаз з мікроліфтом Ideal Standard',
            'Унітаз з підсвіткою Vitra',
            'Унітаз з підігрівом Toto',
            'Унітаз з сенсором Grohe',
            'Біде підвісне Roca',
            'Біде підлогове Villeroy & Boch',
            'Біде з підсвіткою Duravit',
            'Біде з підігрівом Geberit',
            'Біде з сенсором Ideal Standard',
            'Сифон для умивальника AlcaPlast',
            'Сифон для ванни Viega',
            'Сифон для душової кабіни Geberit',
            'Сифон для унітазу McAlpine',
            'Сифон для біде Hansgrohe',
            'Сифон з нержавіючої сталі Kludi',
            'Сифон з пластику Viega',
            'Сифон з латуні AlcaPlast',
            'Сифон з підсвіткою Geberit',
            'Сифон з фільтром McAlpine',
            'Труба пластикова Rehau',
            'Труба металопластикова Uponor',
            'Труба мідна KME',
            'Труба сталева ArcelorMittal',
            'Труба чавунна Saint-Gobain',
            'Труба з нержавіючої сталі Outokumpu',
            'Труба з підсвіткою Viega',
            'Труба з фільтром Geberit',
            'Труба з ізоляцією Uponor',
            'Труба з підігрівом Rehau',
            'Фітинг для пластикових труб Viega',
            'Фітинг для металопластикових труб Uponor',
            'Фітинг для мідних труб KME',
            'Фітинг для сталевих труб ArcelorMittal',
            'Фітинг для чавунних труб Saint-Gobain',
            'Фітинг з нержавіючої сталі Outokumpu',
            'Фітинг з підсвіткою Viega',
            'Фітинг з фільтром Geberit',
            'Фітинг з ізоляцією Uponor',
            'Фітинг з підігрівом Rehau',
            'Радіатор алюмінієвий Fondital',
            'Радіатор біметалевий Global',
            'Радіатор сталевий Kermi',
            'Радіатор чавунний Viadrus',
            'Радіатор з підсвіткою Zehnder',
            'Радіатор з термостатом Danfoss',
            'Радіатор з вентилятором Purmo',
            'Радіатор з підігрівом Vogel & Noot',
            'Радіатор з дзеркалом IRSAP',
            'Радіатор з сенсором Stelrad',
            'Водонагрівач електричний Ariston',
            'Водонагрівач газовий Bosch',
            'Водонагрівач комбінований Drazice',
            'Водонагрівач проточний Stiebel Eltron',
            'Водонагрівач накопичувальний Atlantic',
            'Водонагрівач з підсвіткою Thermex',
            'Водонагрівач з термостатом Gorenje',
            'Водонагрівач з вентилятором Vaillant',
            'Водонагрівач з підігрівом AEG',
            'Водонагрівач з сенсором Ferroli',
            'Змішувач для ванни з душем Grohe',
            'Змішувач для кухні з фільтром Hansgrohe',
            'Змішувач для умивальника з сенсором Roca',
            'Змішувач для душу з термостатом Kludi',
            'Змішувач з термостатом і фільтром Oras',
            'Змішувач з висувним виливом і сенсором Blanco',
            'Змішувач з сенсором і підсвіткою Teka',
            'Змішувач з фільтром і водоспадом Franke',
            'Змішувач з підсвіткою і водоспадом Ideal Standard',
            'Змішувач з водоспадом і термостатом Villeroy & Boch',
            'Умивальник настінний з п\'єдесталом Cersanit',
            'Умивальник підвісний з напівп\'єдесталом Duravit',
            'Умивальник вбудований з тумбою Laufen',
            'Умивальник на стільницю з дзеркалом Vitra',
            'Умивальник з п\'єдесталом і підсвіткою Jika',
            'Умивальник з напівп\'єдесталом і тумбою Geberit',
            'Умивальник з тумбою і дзеркалом Ravak',
            'Умивальник з двома чашами і підсвіткою Kolo',
            'Умивальник з підсвіткою і дзеркалом Jacob Delafon',
            'Умивальник з дзеркалом і підсвіткою RAVAK',
            'Ванна акрилова з гідромасажем Kaldewei',
            'Ванна чавунна з підсвіткою Roca',
            'Ванна сталева з дверцятами Bette',
            'Ванна кутова з підголівником Riho',
            'Ванна овальна з гідромасажем Villeroy & Boch',
            'Ванна прямокутна з підсвіткою Duravit',
            'Ванна з гідромасажем і підсвіткою Jacuzzi',
            'Ванна з підсвіткою і дверцятами Teuco',
            'Ванна з дверцятами і підголівником Novellini',
            'Ванна з підголівником і гідромасажем Ideal Standard',
        ];

        $product = $this->faker->unique()->randomElement($productNames);

        return [
            'title:ru' => TranslateFacade::getTranslateText($product, 'ru'),
            'title:uk' => $product,

            'description:ru' => \FakeParagraph::countParagraph(4, 12),
            'description:uk' => \FakeParagraph::countParagraph(4, 12),

            'price' => rand(200, 300),


            'category_id'=>Category::query()
                ->doesntHave('childrenCategories')
                ->doesntHave('childrenCategories.childrenCategories')
                ->inRandomOrder()
                ->value('id'),

            'manufacturer_id'=>Manufacturer::query()->inRandomOrder()->value('id'),
            'currency_id'=>Currency::query()->inRandomOrder()->value('id'),

            'sku' => rand(100, 500),
            'sale' => fake()->boolean(20) ? rand(10, 25) : null,

            'priceTen' => rand(150, 200),
            'priceTwenty' => rand(100, 145),
            'is_top' => fake()->boolean(10),
            'is_new' => fake()->boolean(15),

            'qtyMilkoopt' => rand(20, 30),
            'qtyOpt' => rand(50, 70),
        ];
    }
}
