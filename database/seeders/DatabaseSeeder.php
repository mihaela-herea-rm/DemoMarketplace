<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $categorySeeder = new CategorySeeder();
        $countySeeder = new CountySeeder();
        $citySeeder = new CitySeeder();
        $userSeeder = new UserSeeder();
        $serviceSeeder = new ServicesSeeder();
        $commentsSeeder = new CommentsSeeder();

        Schema::disableForeignKeyConstraints();
        $commentsSeeder->truncate();
        $serviceSeeder->truncate();
        $categorySeeder->truncate();
        $citySeeder->truncate();
        $countySeeder->truncate();
        $userSeeder->truncate();
        Schema::enableForeignKeyConstraints();

        $categorySeeder->run();
        $countySeeder->run();
        $citySeeder->run();
        $userSeeder->run();
        $serviceSeeder->run();
    }
}
