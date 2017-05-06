<?php

use Illuminate\Database\Seeder;
use Blog\Comment;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Blog\Comment::class, 10)->create();
    }
}
