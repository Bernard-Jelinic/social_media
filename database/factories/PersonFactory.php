<?php

namespace Database\Factories;

use App\Models\City;
use App\Models\Country;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Person>
 */
class PersonFactory extends Factory
{
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $headline = fake()->jobTitle();

        while (strlen($headline) > 20) {
            $headline = fake()->jobTitle();
        }

        $about = fake()->paragraph();

        while (strlen($about) > 255){
            $about = fake()->paragraph();
        }

        if (count(Country::get()) == 0) {
            Country::create(['name' => 'Croatia']);
            Country::create(['name' => 'Germany']);
            Country::create(['name' => 'France']);
            Country::create(['name' => 'Italia']);
            Country::create(['name' => 'Slovenia']);
            Country::create(['name' => 'Serbia']);
            Country::create(['name' => 'UK']);
            Country::create(['name' => 'Spain']);
            Country::create(['name' => 'Portugal']);
        }
        $country_id = Country::inRandomOrder()->first()->id;

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

        $city_id = City::where('country_id', $country_id)->inRandomOrder()->first()->id;

        return [
            'is_page' => false,
            'is_online' => fake()->boolean,
            'first_name' => fake()->firstName(),
            'last_name' => fake()->lastName(),
            'country_id' => $country_id,
            // 'country_id' => (Country::inRandomOrder()->first() == null) ? null : Country::inRandomOrder()->first()->id,
            'city_id' => $city_id,
            'headline' => $headline,
            'about' => $about,
            'profile_image' => 'assets/images/default_profile_images/person.png',
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => static::$password ??= Hash::make('password'),
            // 'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
