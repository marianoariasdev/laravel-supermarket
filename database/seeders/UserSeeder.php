<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $user =  User::firstOrCreate([
            'name' => 'Mariano',
            'email' => env('USER_EMAIL'),
            'password' => bcrypt(env('USER_PASSWORD'))
        ]);

        $user->assignRole('admin');
        $user->givePermissionTo(Permission::all());
    }
}
