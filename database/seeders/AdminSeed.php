<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(DB::table('users')->count() == 0){
            DB::table('users')->insert([
                [
                    'id' => 1,
                    'name' => 'Super Admin',
                    'email' => 'edosusanto46@gmail.com',
                    'roles' => 'admin',
                    'password' => bcrypt('password123#!'),
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ]
            ]);
        } else { echo "\e[31mTable is not empty, therefore NOT "; }
    }
}
