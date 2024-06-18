<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = new User();
        $admin->name = 'Web Admin';
        $admin->email = 'admin@local.test';
        $admin->password = Hash::make('admin');
        $admin->save();
        $admin->roles()->attach(Role::where('name', 'admin')->first());

        $user = new User();
        $user->name = 'Web User';
        $user->email = 'user@local.test';
        $user->password = Hash::make('user');
        $user->save();
        $user->roles()->attach(Role::where('name', 'user')->first());
    }
}
