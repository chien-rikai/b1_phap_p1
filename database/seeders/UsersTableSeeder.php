<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
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
                "name" => "Huỳnh Văn Pháp",
                "email" => "admin@gmail.com",
                "password" => Hash::make('123456'),
                "remember_token" => ""
            ],

        ];

        User::truncate();
        User::insert($data);
    }
}
