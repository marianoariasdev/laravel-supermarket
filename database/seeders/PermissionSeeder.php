<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    public function run(): void
    {
        $permissions = [
            // users
            ['name' => 'users.index', 'display_name' => 'View Users'],
            ['name' => 'users.create', 'display_name' => 'Create Users'],
            ['name' => 'users.edit', 'display_name' => 'Edit Users'],
            ['name' => 'users.delete', 'display_name' => 'Delete Users'],

            // categories
            ['name' => 'categories.index', 'display_name' => 'View Categories'],
            ['name' => 'categories.create', 'display_name' => 'Create Categories'],
            ['name' => 'categories.edit', 'display_name' => 'Edit Categories'],
            ['name' => 'categories.delete', 'display_name' => 'Delete Categories'],

            // products 
            ['name' => 'products.index', 'display_name' => 'View Products'],
            ['name' => 'products.create', 'display_name' => 'Create Products'],
            ['name' => 'products.edit', 'display_name' => 'Edit Products'],
            ['name' => 'products.delete', 'display_name' => 'Delete Products'],
          
            // sales
            ['name' => 'sales.index', 'display_name' => 'View Sales'],
            ['name' => 'sales.create', 'display_name' => 'Create Sales'],
            ['name' => 'sales.edit', 'display_name' => 'Edit Sales'],
            ['name' => 'sales.delete', 'display_name' => 'Delete Sales'],
        ];

        foreach($permissions as $permission) {
           Permission::firstOrCreate($permission); 
        }
    }
}
