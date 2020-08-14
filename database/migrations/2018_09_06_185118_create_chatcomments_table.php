<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChatcommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chatcomments', function (Blueprint $table) {
            $table->increments('id');
//            $table->string('name');
             //$table->boolean('approved');
            $table->integer('user_id')->unsigned();
            $table->integer('chat_id');
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
        Schema::dropIfExists('chatcomments');
    }
}
