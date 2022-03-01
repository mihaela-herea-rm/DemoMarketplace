<?php

namespace Database\Seeders;

use App\Enums\UserRoles;
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
                'role' => UserRoles::ADMIN,
            ]
        );
        User::factory()->create(
            [
                'name' => 'Nathan Barnes',
                'email' => 'nathan.barnes@gmail.com',
                'role' => UserRoles::ADMIN,
            ]
        );
        User::factory()->create(
            [
                'name' => 'Sophie Nolan',
                'email' => 'sophie.nolan@gmail.com',
                'role' => UserRoles::USER,
            ]
        );
        User::factory()->create(
            [
                'name' => 'Anthony Lee',
                'email' => 'anthony.lee@example.com',
                'role' => UserRoles::USER,
            ]
        );
        User::factory()->create(
            [
                'name' => 'Mihaela Herea',
                'email' => 'mihaela.herea@imobiliare.ro',
                'password' => 'mihaela123',
                'role' => UserRoles::ADMIN,
            ]
        );
    }

    public function truncate()
    {
        User::truncate();
    }
}
