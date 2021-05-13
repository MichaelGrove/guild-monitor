<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRolesToUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('account_name', 255)->nullable();
            $table->string('api_key', 255)->nullable();
            $table->boolean('is_validated')->default(false);
            $table->boolean('is_leader')->default(false);
            $table->boolean('is_admin')->default(false);
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
            $table->dropColumn('account_name');
            $table->dropColumn('api_key');
            $table->dropColumn('is_validated');
            $table->dropColumn('is_leader');
            $table->dropColumn('is_admin');
        });
    }
}
