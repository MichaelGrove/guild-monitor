<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAccountDataToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->integer('world_id')->nullable();
            $table->string('world_name', 255)->nullable();
            $table->integer('fractal_level')->nullable();
            $table->integer('wvw_rank')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('world_id');
            $table->dropColumn('world_name');
            $table->dropColumn('fractal_level');
            $table->dropColumn('wvw_rank');
        });
    }
}
