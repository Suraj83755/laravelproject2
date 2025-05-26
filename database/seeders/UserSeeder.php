<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Faker\Factory as Faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker=Faker::create();
        for ($i = 0; $i < 40; $i++) {
        $user = new User();
        $user->name = $faker->name;
        $user->Age = rand(18, 60);
        $user->Email = $faker->unique()->safeEmail;
        $user->Password =  Hash::make('password123');
        $user->Gender = $faker->randomElement(['Male', 'Female','Other']);
        $user->save();
        }
    }
}
