<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PostsTableSeeder extends Seeder
{

    public function run()
    {
        // DB::table('posts')->truncate();

        DB::table('posts')->insert([
            [ 
                'title' => 'cats title',
                'content' => 'cats content',
                'image' => 'cat1.jpg',
                'likes' => 10,
                'is_published' => 1,
                'category_id' => 1,
            ],
            //  php artisan db:seed --class=PostsTableSeeder
        ]);
    }
}
