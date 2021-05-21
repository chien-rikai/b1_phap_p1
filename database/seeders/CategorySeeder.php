<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                "name" => 'sữa',
                "slug" => Str::slug('sữa'),
            ],
        ];

        Category::truncate();
        Category::insert($data);
    }
}
