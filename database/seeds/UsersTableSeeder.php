<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
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
        for($i = 0; $i < 5; $i++){
            DB::table('users')->insert([
                'first_name' => Str::random(10),
                'last_name' => Str::random(10),
                'email' => Str::random(10).'@gmail.com',
                'phone_number' => Str::random(10),
                'password' => Str::random(10),
            ]);
        }
    }
}
