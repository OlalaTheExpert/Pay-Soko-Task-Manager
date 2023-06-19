<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use HasFactory;
use App\Models\User;
use App\Models\Task;

use Illuminate\Support\Str;

use DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(){
        
       \App\Models\User::factory(1)->create();
       \App\Models\Task::factory(10)->create();
    //    $this->call([
    //         TasksTableSeeder::class,
    //     ]);
        // User::create([        
        //     'name' => 'Admin',
        //     'email' => 'admin@admin00',
        //     'password' => Hash::make('admin@00'),
        //     'remember_token' => Str::random(10),                    
        //     'email_verified_at' => now(),
        //     'role'=>'1',          
            
        // ]);
       
    }

    }

