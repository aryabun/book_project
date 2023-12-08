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

        $roles =[
            ['name' => 'admin'],
            ['name' => 'user'],
        ];
        foreach($roles as $role){
            Role::create($role);
        }
        Book::factory(50)->create();
        $users = User::factory(10)->create();
        foreach($users as $user){
            $user->assignRole('user');
        }
    }
}
