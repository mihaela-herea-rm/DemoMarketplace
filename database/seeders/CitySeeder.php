<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\County;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 0; $i < 3; $i++) {
            for($j = 0; $j < 3; $j++) {
                City::factory()->create(
                    [
                        'county_id' => $i+1,
                        'name' => 'City ' . ($j+1) . ' - ' . ($i+1)
                    ]
                );
            }
        }
    }

    public function truncate()
    {
        City::truncate();
    }
}
