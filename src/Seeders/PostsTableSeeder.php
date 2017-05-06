<?php

use Illuminate\Database\Seeder;
use Blog\Post;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {        
        factory(Blog\Post::class, 10)->create();
    }
}
