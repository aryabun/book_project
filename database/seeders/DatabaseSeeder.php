<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Book;
use Illuminate\Database\Seeder;
use \App\Models\User;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        
        Role::create([
                'name' => 'admin',
                // 'email' => 'test@example.com',
            ]);
        User::factory(10)->create();
        Book::factory(50)->create();
        
    }
}
