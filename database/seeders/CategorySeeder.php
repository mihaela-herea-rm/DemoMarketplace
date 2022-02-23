<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::factory()->create(
            [
                'name' => 'Haircut',
                'slug' => 'haircut'
            ]
        );
        Category::factory()->create(
            [
                'name' => 'Hair dyeing',
                'slug' => 'hair-dyeing'
            ]
        );
        Category::factory()->create(
            [
                'name' => 'Hairdressing',
                'slug' => 'hairdressing'
            ]
        );
        Category::factory()->create(
            [
                'name' => 'Hair treatment',
                'slug' => 'hair-treatment'
            ]
        );
        Category::factory()->create(
            [
                'name' => 'Manicure and pedicure',
                'slug' => 'manicure-pedicure'
            ]
        );
        Category::factory()->create(
            [
                'name' => 'Make Up',
                'slug' => 'make-up'
            ]
        );
        Category::factory()->create(
            [
                'name' => 'Massage',
                'slug' => 'massage'
            ]
        );
        Category::factory()->create(
            [
                'name' => 'Beauty',
                'slug' => 'beauty'
            ]
        );
        Category::factory()->create(
            [
                'name' => 'Eyebrow Styling',
                'slug' => 'eyebrow-styling'
            ]
        );
        Category::factory()->create(
            [
                'name' => 'Barber',
                'slug' => 'barber'
            ]
        );
    }

    public function truncate()
    {
        Category::truncate();
    }
}
