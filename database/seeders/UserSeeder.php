<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'id' => 1,
            'firstname' => fake()->firstName(),
            'lastname' => fake()->lastName(),
            'user_type' => 'user',
            'account_number' => null,
            'account_name' => null,
            'bank_name' => null,
            'wallet_balance' => 2000,
            'total_contacts' => 25,
            'phone' => fake()->phoneNumber(),
            'email' => 'afuwapesunday12@gmail.com',
            'avatar' => 'https://ouch-cdn2.icons8.com/JFT45MQm1c-Eg5jP7cuJzMZNXQ2NaQ-1cTTYHQyyhsw/rs:fit:256:256/czM6Ly9pY29uczgu/b3VjaC1wcm9kLmFz/c2V0cy9zdmcvMjA2/LzE0ZDQ1MDVhLTUx/ZTQtNDJlNC04YTYx/LWVmOTgwNmY2MGFl/Zi5zdmc.png',
            'password' => Hash::make('logic123'),
        ]);
    }
}
