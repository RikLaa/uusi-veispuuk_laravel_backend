<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('comments')) {
            Schema::drop('comments');
        }

        Schema::create('comments', function(Blueprint $table) {
            $table->increments('commentID');
            $table->integer('postID')->unsigned();
            $table->foreign('postID')->references('postID')->on('posts');
            $table->integer('userID');
            $table->foreign('userID')->references('userID')->on('users');
            $table->string('content', 3000);
            $table->timestamp('created_at');
            $table->timestamp('updated_at');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('comments');
    }
}
