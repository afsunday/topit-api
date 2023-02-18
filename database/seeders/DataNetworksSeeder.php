<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DataNetworksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('data_networks')->insert([
            [
                'network'     => 'MTN',
                'provider_id' => '01',
                'in_store'    => true,
                'created_at'  => \Carbon\Carbon::now(),
                'updated_at'  => \Carbon\Carbon::now()
            ],
            [
                'network'     => 'Glo',
                'provider_id' => '02',
                'in_store'    => true,
                'created_at'  => \Carbon\Carbon::now(),
                'updated_at'  => \Carbon\Carbon::now()
            ],
            [
                'network'     => '9mobile',
                'provider_id' => '03',
                'in_store'    => true,
                'created_at'  => \Carbon\Carbon::now(),
                'updated_at'  => \Carbon\Carbon::now()
            ],
            [
                'network'     => 'Airtel',
                'provider_id' => '04',
                'in_store'    => true,
                'created_at'  => \Carbon\Carbon::now(),
                'updated_at'  => \Carbon\Carbon::now()
            ]
        ]);
    }
}
