<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\User;
use App\Models\Country;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jobTitle = fake()->jobTitle();

        while (strlen($jobTitle) > 20) {
            $jobTitle = fake()->jobTitle();
        }

        $country_id = Country::inRandomOrder()->first()->id;
        $city_id = City::where('country_id', $country_id)->inRandomOrder()->first()->id;

        User::create([
            'first_name' => 'Bernard',
            'last_name' => 'Jelinić',
            'country_id' => $country_id,
            'city_id' => $city_id,
            'headline' => $jobTitle,
            'about' => fake()->paragraph(),
            'email' => 'jelinic.bernard@gmail.com',
            'password' => '123456789'
        ]);
    }
}
