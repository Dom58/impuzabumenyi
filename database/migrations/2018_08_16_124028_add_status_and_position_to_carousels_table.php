<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddStatusAndPositionToCarouselsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('carousels', function (Blueprint $table) {
            $table->boolean('status')->after('body')->default(0);
            $table->string('position')->after('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('carousels', function (Blueprint $table) {
            $table->dropColumn('status');
            $table->dropColumn('position');
        });
    }
}
