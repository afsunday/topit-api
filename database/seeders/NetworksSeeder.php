<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NetworksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('networks')->insert([
            [
                'network'     => 'MTN',
                'provider_id' => '01',
                'created_at'  => \Carbon\Carbon::now(),
                'updated_at'  => \Carbon\Carbon::now()
            ],
            [
                'network'     => 'Glo',
                'provider_id' => '02',
                'created_at'  => \Carbon\Carbon::now(),
                'updated_at'  => \Carbon\Carbon::now()
            ],
            [
                'network'     => '9mobile',
                'provider_id' => '03',
                'created_at'  => \Carbon\Carbon::now(),
                'updated_at'  => \Carbon\Carbon::now()
            ],
            [
                'network'     => 'Airtel',
                'provider_id' => '04',
                'created_at'  => \Carbon\Carbon::now(),
                'updated_at'  => \Carbon\Carbon::now()
            ]
        ]);
    }
}
