<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class ArticlesTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();
        $categoryIds = DB::table('categories')->pluck('id')->toArray();

        for ($i = 0; $i < 50; $i++) {
            DB::table('articles')->insert([
                'title' => $faker->sentence,
                'content' => $faker->paragraphs(3, true),
                'category_id' => $faker->randomElement($categoryIds),
                'image' => $faker->image('public/storage/images', 640, 480, null, false),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
