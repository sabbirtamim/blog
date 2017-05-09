<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('content');
            $table->TIMESTAMP('publish_at');
            $table->string('thumb_url')->nullable()->unique();
            $table->string('title');
            $table->string('status');
            $table->string('slug')->unique();
            $table->string('comment_status')->default(0);
            $table->integer('active')->default(0);
            $table->integer('term_id')->nullable()->unsigned();
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::table('posts', function ($table) {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('term_id')->references('id')->on('terms')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}