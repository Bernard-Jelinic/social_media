<?php

namespace Database\Factories;

use App\Models\City;
use App\Models\Country;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Page>
 */
class PageFactory extends Factory
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

        $country_id = Country::inRandomOrder()->first()->id;
        $city_id = City::where('country_id', $country_id)->inRandomOrder()->first()->id;

        return [
            'is_page' => true,
            'is_online' => fake()->boolean,
            'first_name' => fake()->company(),
            'last_name' => fake()->companySuffix(),
            'country_id' => $country_id,
            // 'country_id' => (Country::inRandomOrder()->first() == null) ? null : Country::inRandomOrder()->first()->id,
            'city_id' => $city_id,
            'headline' => $headline,
            'about' => $about,
            'profile_image' => 'assets/images/default_images/page.png',
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
