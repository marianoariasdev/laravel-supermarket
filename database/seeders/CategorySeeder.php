<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       // if env is not local, do not seed
       if (!app()->isLocal()) {
        return;
    }

    // use factory to create 10 products
    \App\Models\Category::factory(10)->create();
    }
}
