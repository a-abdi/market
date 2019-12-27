<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class GoodsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('goods')->insert([
            'price' => 100000,
            'name' => Str::random(10),
            'img_src' => 'storage/images/0BQL6SMagP6OeHl4KBvCmM2AcHZjSe4PErTC2saE.jpeg',
            'user_id' => 1
        ]);
        DB::table('goods')->insert([
            'price' => 100000,
            'name' => Str::random(10),
            'img_src' => 'storage/images/1jO5rBWkEYdfElHrGl7ZQJK7sbaR03oS6YrrI4w3.png',
            'user_id' => 3
        ]);
        DB::table('goods')->insert([
            'price' => 100000,
            'name' => Str::random(10),
            'img_src' => 'storage/images/D3i3IYLhVvm0hm9VqUKdMzK70Ols4jBwmjKSbgAy.jpeg',
            'user_id' => 2
        ]);
        DB::table('goods')->insert([
            'price' => 100000,
            'name' => Str::random(10),
            'img_src' => 'storage/images/0BQL6SMagP6OeHl4KBvCmM2AcHZjSe4PErTC2saE.jpeg',
            'user_id' => 4
        ]);
        DB::table('goods')->insert([
            'price' => 100000,
            'name' => Str::random(10),
            'img_src' => 'storage/images/0BQL6SMagP6OeHl4KBvCmM2AcHZjSe4PErTC2saE.jpeg',
            'user_id' => 4
        ]);
    }
}
