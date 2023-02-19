<?php

namespace Database\Seeders;

use App\Models\Contact;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Collection;

class ContactsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::where('user_type', 'user')->get()
        ->each(function($user) {
            Collection::times(10, function($n) use ($user) {
                Contact::create([
                    'user_id' => $user->id,
                    'network_id' => fake()->randomElement([1, 3, 2]),
                    'firstname' => fake()->firstName(),
                    'lastname' => fake()->lastName(),
                    'phone_number' => '08149617' . rand(100, 999),
                    'email' => fake()->unique()->email(),
                    'status' => true,
                ]);
            });
        });
    }
}
