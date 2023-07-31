<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'key' => 'system_name',
                'value' => 'pos'
            ],

            [
                'key' => 'phone',
                'value' => '01006005105'
            ],
            [
                'key' => 'address',
                'value' => 'aga'
            ],
            [
                'key' => 'image',
                'value' => '56d7uj'
            ],
            [
                'key' => 'status',
                'value' => 1
            ],
            [
                'key' => 'added_by',
                'value' => 'mohamed eid'
            ],
            [
                'key' => 'updated_by',
                'value' => 'mohamed eid'
            ]

        ];

        DB::table('settings')->insert($data);
    }
}
