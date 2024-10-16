<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(): void
    {
        $this->call([RoleSeeder::class]);
        $this->call([UserSeeder::class]);
        $this->call([CurrencySeeder::class]);

        //
        if (env('APP_ENV') === 'local') {
            $this->call([CategorySeeder::class]);
            $this->call([CategoryInMainSeeder::class]);
            $this->call([SubcategorySeeder::class]);
            $this->call([SubcategoryThreeTreasSeeder::class]);
            $this->call([ManufacturerSeeder::class]);
            $this->call([ArticleSeeder::class]);

            //            $this->call([ColorSeeder::class]);
            //            $this->call([BestsellerSeeder::class]);
            //            $this->call([NewProductSeeder::class]);
        }
        $this->call([PoliticSeeder::class]);
        $this->call([ReturnSeeder::class]);
        $this->call([OfertaSeeder::class]);
        $this->call([BenefitSeeder::class]);
        $this->call([ProductSeeder::class]);
        $this->call([MainSeeder::class]);
        $this->call([SettingSeeder::class]);
    }
}
