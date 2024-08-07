<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            CountrySeeder::class,
            CitySeeder::class,
            UserSeeder::class,
            PersonSeeder::class,
            PageSeeder::class,
            PostSeeder::class,
            LikeSeeder::class,
            CommentSeeder::class,
            ProfileViewSeeder::class,
            ProfileViewSeeder::class,
            ProfileViewSeeder::class,
            ChatConversationSeeder::class,
            ChatParticipantSeeder::class,
            ChatMessageSeeder::class,
        ]);
    }
}
