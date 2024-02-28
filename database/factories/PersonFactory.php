<?php

namespace Database\Factories;

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

        return [
            'is_page' => false,
            'first_name' => fake()->firstName(),
            'last_name' => fake()->lastName(),
            'headline' => $headline,
            'about' => fake()->paragraph(),
            'country_id' => (Country::inRandomOrder()->first() == null) ? null : Country::inRandomOrder()->first()->id,
            'profile_image' => 'assets/images/default_images/person.png',
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
