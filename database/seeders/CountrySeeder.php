<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Country::create(['name' => 'Croatia']);
        Country::create(['name' => 'Germany']);
        Country::create(['name' => 'France']);
        Country::create(['name' => 'Italia']);
        Country::create(['name' => 'Slovenia']);
        Country::create(['name' => 'Serbia']);
        Country::create(['name' => 'UK']);
        Country::create(['name' => 'Spain']);
        Country::create(['name' => 'Portugal']);
        // if (Country::count() == 0) {
        //     $values = array();

        //     $countries = Http::get('https://restcountries.com/v3.1/all');

        //     foreach ($countries->json() as $country) {
        //         array_push($values, [
        //             'name' => $country['name']['common']
        //         ]);
        //     }
    
        //     Country::insert($values);
        // }
    }
}
