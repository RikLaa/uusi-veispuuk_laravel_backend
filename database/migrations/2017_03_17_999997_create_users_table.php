<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('users')) {
            Schema::drop('comments');
            Schema::drop('posts');
            Schema::drop('users');
        }

        Schema::create('users', function(Blueprint $table) {
            $table->increments('userID');
            $table->integer('userRole');
            
          //  $table->binary('pictureURL');
            $table->string('firstName', 50);
            $table->string('lastName', 60);
            $table->string('password', 512);
            $table->string('email', 60);
            $table->string('field', 45);
            $table->string('campus', 45);
        });
		DB::statement("ALTER TABLE users ADD pictureURL LONGBLOB");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }
}
