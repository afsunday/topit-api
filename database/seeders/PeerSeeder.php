<?php

namespace Database\Seeders;

use App\Models\PeerFriend;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Seeder;

class PeerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::where('user_type', 'user')->get()
        ->each(function($user) {
            Collection::times(50, function($n) use ($user) {
                PeerFriend::create([
                    'user_id' => $user->id,
                    'avatar' => fake()->randomElement([
                        'https://cdn.pixabay.com/photo/2013/07/13/10/07/man-156584_960_720.png',
                        'https://cdn.pixabay.com/photo/2016/08/20/05/38/avatar-1606916_960_720.png',
                        'https://cdn.pixabay.com/photo/2021/06/26/09/33/woman-6365737_960_720.png'
                    ]),
                    'first_name' => fake()->firstName(),
                    'last_name' => fake()->lastName(),
                    'phone_number' => '08149617' . rand(100, 999),
                ]);
            });
        });
    }
}
