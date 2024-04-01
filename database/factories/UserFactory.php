<?php

namespace Database\Factories;

use App\Models\Country;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $is_page = fake()->boolean;
        
        if ($is_page) {
            $first_name = fake()->company();
            $last_name = fake()->companySuffix();
            $headline = fake()->catchPhrase();
        } else {
            $first_name = fake()->firstName();
            $last_name = fake()->lastName();
            $headline = fake()->jobTitle();
            
            while (strlen($headline) > 20) {
                $headline = fake()->jobTitle();
            }
        }

        return [
            'is_page' => $is_page,
            'is_online' => fake()->boolean,
            'first_name' => $first_name,
            'last_name' => $last_name,
            'headline' => $headline,
            'country_id' => (Country::inRandomOrder()->first() == null) ? null : Country::inRandomOrder()->first()->id,
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
