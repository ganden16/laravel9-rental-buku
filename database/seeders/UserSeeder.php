<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'role_id' => 1,
            'username' => 'admin',
            'password' => Hash::make('password'),
            'phone' => fake()->phoneNumber(),
            'address' => fake()->address(),
            'status' => 'active'
        ]);

        for ($i = 1; $i <= 5; $i++) {
            User::create([
                'role_id' => 2,
                'username' => fake()->userName(),
                'password' => Hash::make('password'),
                'phone' => fake()->phoneNumber(),
                'address' => fake()->address(),
                'status' => 'inactive'
            ]);
        }
        for ($i = 1; $i <= 5; $i++) {
            $user = User::create([
                'role_id' => 2,
                'username' => fake()->userName(),
                'password' => Hash::make('password'),
                'phone' => fake()->phoneNumber(),
                'address' => fake()->address(),
                'status' => 'active'
            ])->delete();
        }

        for ($i = 1; $i <= 5; $i++) {
            User::create([
                'role_id' => 2,
                'username' => fake()->userName(),
                'password' => Hash::make('password'),
                'phone' => fake()->phoneNumber(),
                'address' => fake()->address(),
                'status' => 'active'
            ]);
        }
    }
}
