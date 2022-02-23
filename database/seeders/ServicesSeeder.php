<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\City;
use App\Models\County;
use App\Models\Service;
use Illuminate\Database\Seeder;

class ServicesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Service::truncate();

        $countiesLimit = County::count();
        $categoriesLimit = Category::count();
        for($i = 1; $i <= 20; $i++) {
            $county_id = random_int(1, $countiesLimit);
            $cities = City::where('county_id', $county_id)->get();
            $city_id = random_int($cities[0]->id, $cities[count($cities)-1]->id);

            Service::factory()->create(
                [
                    'category_id' => random_int(1, $categoriesLimit),
                    'city_id' => $city_id,
                    'user_id' => random_int(1, 2),
                ]
            );
        }
    }

    public function truncate()
    {
        Service::truncate();
    }
}
