<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TreasuriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'name' => 'Treasury 1',
                'is_master' => 1,
                'status' => 1,
                'last_exchange_receipt' => '2456789',
                'last_collection_receipt' => '2456789',
                'added_by' => 1,
                'updated_by' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Treasury 2',
                'is_master' => 1,
                'status' => 1,
                'last_exchange_receipt' => '34543454',
                'last_collection_receipt' => '34543454',
                'added_by' => 1,
                'updated_by' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Treasury 3',
                'is_master' => 0,
                'status' => 0,
                'last_exchange_receipt' => '23543454',
                'last_collection_receipt' => '23543454',
                'added_by' => 2,
                'updated_by' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('treasuries')->insert($data);
    }
}
