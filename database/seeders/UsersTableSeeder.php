<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Admin02',
            'email' => 'admin@admin002',
            'password' => Hash::make('admin@002'),
            'remember_token' => Str::random(10),                    
            'email_verified_at' => now(),
            'role'=>'1',      
        ]);
    }
}
