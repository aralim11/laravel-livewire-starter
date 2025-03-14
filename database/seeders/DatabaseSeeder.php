<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->createMany([
            [
                'name' => 'Abdul Alim',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('12345678'),
            ],
            [
                'name' => 'John Doe',
                'email' => 'jd@gmail.com',
                'password' => Hash::make('12345678'),
            ],
        ]);

        $this->call([
            PermissionsSeeder::class,
            RolesSeeder::class,
        ]);

        User::factory(100)->create();
    }
}
