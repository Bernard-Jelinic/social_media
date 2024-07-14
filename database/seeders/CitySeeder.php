<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\Country;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (City::count() == 0) {
            $values = array();

            $countries = Country::all();

            foreach ($countries as $country) {
                array_push($values, [
                    'country_id' => $country['id'],
                    'name' => $country['name'] . ' City_1'
                ]);
                array_push($values, [
                    'country_id' => $country['id'],
                    'name' => $country['name'] . ' City_2'
                ]);
                array_push($values, [
                    'country_id' => $country['id'],
                    'name' => $country['name'] . ' City_3'
                ]);
            }
    
            City::insert($values);
        }
    }
}
