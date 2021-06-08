<?php

use Database\Seeders\UsersTableSeeder;
use Database\Seeders\CategorySeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    public function run()
    {
        $this->call([
            CategorySeeder::class,
            UsersTableSeeder::class,
        ]);
    }
}
