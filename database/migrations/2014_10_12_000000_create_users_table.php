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
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');

            $table->string('sname')->nullable();

            $table->string('username')->unique();

            $table->string('profile_image')->nullable();

            $table->boolean('gender')->nullable();

            $table->string('tel')->unique()->nullable();

            $table->string('district')->nullable();

            $table->string('sector')->nullable();

            $table->string('email')->unique();

            $table->string('password',60);

            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
