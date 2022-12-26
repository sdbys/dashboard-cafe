<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facedes\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            "name"=> "Administrator",
            "email"=> "admin@cafebim.com",
            "email_verified_at"=> date("Y-m-d h:i:s"),
            "password" => Hash::make("admin"),
        ]);
    }
}
