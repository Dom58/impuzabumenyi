<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddStatusToIbikoreshogakondosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ibikoreshogakondos', function (Blueprint $table) {
            $table->boolean('status')->after('description')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ibikoreshogakondos', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }
}
