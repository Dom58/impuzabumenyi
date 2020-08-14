<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddStatusToNtibavugasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ntibavugas', function (Blueprint $table) {
            $table->boolean('status')->after('igisobanuro')->default(1);
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
            $table->dropColumn('status');
        });
    }
}
