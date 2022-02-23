<?php

namespace Database\Seeders;

use App\Enums\UserRole;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->create(
            [
                'name' => 'Samantha Morgan',
                'email' => 'samantha.morgan@gmail.com',
                'role' => 1,
            ]
        );
        User::factory()->create(
            [
                'name' => 'Nathan Barnes',
                'email' => 'nathan.barnes@gmail.com',
                'role' => 1,
            ]
        );
        User::factory()->create(
            [
                'name' => 'Sophie Nolan',
                'email' => 'sophie.nolan@gmail.com',
                'role' => 2,
            ]
        );
        User::factory()->create(
            [
                'name' => 'Anthony Lee',
                'email' => 'anthony.lee@example.com',
                'role' => 2,
            ]
        );
    }

    public function truncate()
    {
        User::truncate();
    }
}
