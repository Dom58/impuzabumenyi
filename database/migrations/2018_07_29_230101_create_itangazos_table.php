<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItangazosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('itangazos', function (Blueprint $table) {

             $table->increments('id');
            $table->smallInteger('news_type');
            $table->string('organisation')->nullable();
            $table->string('pub_link',700)->nullable();
            $table->text('description');
            $table->boolean('status')->default(0);
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
        Schema::dropIfExists('itangazos');
    }
}
