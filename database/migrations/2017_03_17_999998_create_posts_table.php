<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
    {

        Schema::create('posts', function(Blueprint $table) {
            $table->increments('postID');
            $table->integer('userID')->unsigned();
            $table->foreign('userID')->references('userID')->on('users');
            $table->integer('postType');
            $table->string('pictureURL', 60)->nullable();
            $table->string('tag', 45);
            $table->string('title', 800);
            $table->string('content', 3000);
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('posts');
    }
}