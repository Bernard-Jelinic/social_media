<?php

namespace Database\Seeders;

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

        User::create([
            'first_name' => 'Bernard',
            'last_name' => 'Jelinić',
            'country_id' => Country::where('name', 'Croatia')->first()->id,
            'headline' => $jobTitle,
            'email' => 'jelinic.bernard@gmail.com',
            'password' => '123456789'
        ]);

        User::factory(14)->create();
    }
}
