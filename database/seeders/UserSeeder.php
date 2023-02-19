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
            'firstname' => fake()->firstName(),
            'lastname' => fake()->lastName(),
            'user_type' => 'user',
            'account_number' => null,
            'account_name' => null,
            'bank_name' => null,
            'wallet_balance' => 0,
            'phone' => fake()->phoneNumber(),
            'email' => 'afuwapesunday12@gmail.com',
            'avatar' => fake()->imageUrl(),
            'password' => Hash::make('logic123'),
        ]);
    }
}
