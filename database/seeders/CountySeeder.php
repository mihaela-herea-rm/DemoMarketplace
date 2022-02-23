<?php

namespace Database\Seeders;

use App\Models\County;
use Illuminate\Database\Seeder;

class CountySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        County::factory()->create(
            [
                'name' => 'Ilfov',
                'slug' => 'ilfov'
            ]
        );
        County::factory()->create(
            [
                'name' => 'Timis',
                'slug' => 'timis'
            ]
        );
        County::factory()->create(
            [
                'name' => 'Cluj',
                'slug' => 'cluj'
            ]
        );
    }

    public function truncate()
    {
        County::truncate();
    }
}
