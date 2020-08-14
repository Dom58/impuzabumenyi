<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNtibavugacategoryIdToNtibavugasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ntibavugas', function (Blueprint $table) {
            $table->integer('ntibavugacategory_id')->unsigned()->nullable()->after('user_id');
            $table->foreign('ntibavugacategory_id')->references('id')->on('ntibavugacategories')
                ->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ntibavugas', function (Blueprint $table) {
            $table->dropColumn('ntibavugacategory_id');
        });
    }
}
