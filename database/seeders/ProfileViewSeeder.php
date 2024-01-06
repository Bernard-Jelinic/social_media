<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\User;
use App\Models\ProfileView;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProfileViewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::get();

        foreach ($users as $user) {

            // // Select a random user from DB
            $visitorId = $users->pluck('id')->random();

            // // Get the current date and time
            $currentDateTime = Carbon::now();
            // // Generate a random number of days between 0 and 14
            $randomDays = mt_rand(0, 14);
            // // Subtract the random number of days from the current date
            $randomDate = $currentDateTime->subDays($randomDays);
            // // Format the random date as per your specified format
            $formattedRandomDate = $randomDate->format('Y-m-d H:i:s');

            // // Create profile view record
            $profileView = new ProfileView();
            $profileView->user_id = $user->id;
            $profileView->visitor_id = $visitorId;
            $profileView->viewed_at = $formattedRandomDate;
            $profileView->save();
        }
    }
}
