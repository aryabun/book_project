<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Book;
use Illuminate\Database\Seeder;
use \App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
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
        $permissions =[
            ['name' => 'create-book'],
            ['name' => 'edit-book'],
            ['name' => 'delete-book'],
            ['name' => 'view-dashboard'],
        ];
        foreach($roles as $role){
            Role::create($role);
        }
        foreach($permissions as $permission){
            Permission::create($permission);
        }
        Book::factory(50)->create();
        $admin = User::create([
            'name' => 'Arya',
            'email' => 'arya@email.com',
            'password' => Hash::make('12345678')
        ]);
        $admin->assignRole('admin');
        foreach($permissions as $permission){
            $admin->givePermissionTo($permission);
        }
        $users = User::factory(10)->create();
        foreach($users as $user){
            $user->assignRole('user');
        }
    }
}
