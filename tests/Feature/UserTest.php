<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Database\Seeders\UsersTableSeeder;

class UserTest extends TestCase
{
public function test_the_application_returns_a_successful_response(): void
    {
    
     $user = User::factory()->create();
     $this->assertModelExists($user);
     
    }

     public function test_if_it_stores_new_users()
    {
        $response = $this->post('/register', [
            'name' => 'Admin02',
            'email' => 'admin@admin002',
            'password' => Hash::make('admin@00'),
            'remember_token' => Str::random(10),                    
            'email_verified_at' => now(),
            'role'=>'0',    
        ]);

        $response->assertRedirect('/');
    }
    public function test_if_data_exists_in_database()
    {
        $this->assertDatabaseHas('users', [
            'name' => 'Admin'
        ]);
    }

   public function test_if_the_data_exists_in_database()
    {
        $this->assertDatabaseHas('users', [
    'email' => 'admin@admin00',
        ]);
        
    }
     public function test_if_the_data_does_not_exists_in_database()
    {
      $this->assertDatabaseMissing('users', [
    'email' => 'olala@example.com',
        ]);
        
    }

 public function test_delete_user()
    {
        $user = User::factory()->count(1)->make();

        $user = User::first();

        if($user) {
            $user->delete();
        }

        $this->assertTrue(true);
    }

 public function test_if_seeders_works()
    {
        $this->seed();
        //$this->seed(UsersTableSeeder::class);
    }
     public function test_if_seeder_works()
    {
        $this->seed(UsersTableSeeder::class);
    }
}
