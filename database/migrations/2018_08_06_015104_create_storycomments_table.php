<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStorycommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('storycomments', function (Blueprint $table) {
            $table->increments('id');
//            $table->string('name');
             //$table->boolean('approved');
            $table->integer('user_id')->unsigned();
            $table->integer('post_id');
            $table->text('comment');
            
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
        Schema::dropIfExists('storycomments');
    }
}
