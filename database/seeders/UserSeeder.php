<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'first_name' => 'Bernard',
            'last_name' => 'Jelinić',
            'email' => 'jelinic.bernard@gmail.com',
            'password' => '123456789'
        ]);

        User::factory(14)->create();
    }
}
