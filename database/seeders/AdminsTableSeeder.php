<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('admins')->insert([
            ['name' => 'Mohamed Eid', 'email' => 'mohamed@gmail.com', 'password' => bcrypt('mohamedeid')],
            ['name' => 'Mohamed Abdelatty', 'email' => 'mohamedabdelatty@gmail.com', 'password' => bcrypt('mohamedeid')],
        ]);
    }
}
