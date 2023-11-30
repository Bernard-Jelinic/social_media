<?php

namespace Database\Seeders;

use App\Models\FriendStatuses;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class FriendStatusesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        FriendStatuses::create([
            'id' => 10,
            'name' => 'In process'
        ]);

        FriendStatuses::create([
            'id' => 20,
            'name' => 'Accepted'
        ]);

        FriendStatuses::create([
            'id' => 30,
            'name' => 'Rejected'
        ]);
    }
}
