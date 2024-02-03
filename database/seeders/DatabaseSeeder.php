<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use App\Classes\Users\UserConstants;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //seed 100 admin users
        User::factory(100)->create([
            'type' => UserConstants::USER_TYPE_ADMIN,
        ]);

        //seed 10000 normal users
        User::factory(10000)->create([
            'type' => UserConstants::USER_TYPE_NORMAL,
        ]);
    }
}
