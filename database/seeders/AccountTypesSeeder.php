<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AccountTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
             [
                 'name' => 'مورد',
                 'status' => 1,
                 'related_internal_accounts' => 0
             ],
            [
                'name' => 'عميل',
                'status' => 1,
                'related_internal_accounts' => 0
            ],
            [
                'name' => 'مندوب',
                'status' => 1,
                'related_internal_accounts' => 0
            ],
            [
                'name' => 'بنكي',
                'status' => 1,
                'related_internal_accounts' => 0
            ],
            [
                'name' => 'موظف',
                'status' => 1,
                'related_internal_accounts' => 0
            ],
            [
                'name' => 'عام',
                'status' => 1,
                'related_internal_accounts' => 0
            ],
            [
                'name' => 'مصروفات',
                'status' => 1,
                'related_internal_accounts' => 0
            ],
            [
                'name' => 'قسم داخلي',
                'status' => 1,
                'related_internal_accounts' => 0
            ],
            [
                'name' => 'راس مال',
                'status' => 1,
                'related_internal_accounts' => 0
            ],

        ];

        DB::table('account_types')->insert($data);
    }
}
