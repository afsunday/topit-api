<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\WalletHistory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Collection;

class HistorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {        
        User::where('user_type', 'user')->get()
        ->each(function($user) {
            Collection::times(200, function($n) use ($user) {
                WalletHistory::create([
                    'user_id' => $user->id,
                    'item_image' => fake()->randomElement(['mtn.png', 'glo.png', '9mobile.png', 'airtel.png']),
                    'transaction_ref' => strtoupper(bin2hex(random_bytes(5))),
                    'amount' => fake()->randomElement(range(500, 5000, 450)),
                    'description' => fake()->realText(50),
                    'entry' => fake()->randomElement(['debit', 'credit']),
                    'status' => fake()->randomElement(['approved', 'declined', 'pending']),
                    'transaction_date' => now()
                ]);
        
            });
        });
    }
}
