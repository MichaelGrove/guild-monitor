<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailedHistoryTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('join_logs', function (Blueprint $table) {
            $table->id();
            $table->string('user', 150);
        });

        Schema::create('invite_logs', function (Blueprint $table) {
            $table->id();
            $table->string('user', 150);
            $table->string('invited_by', 150);
        });

        Schema::create('kick_logs', function (Blueprint $table) {
            $table->id();
            $table->string('user', 150);
            $table->string('kicked_by', 150);
        });

        Schema::create('rank_change_logs', function (Blueprint $table) {
            $table->id();
            $table->string('changed_by', 150);
            $table->string('old_rank', 150);
            $table->string('new_rank', 150);
        });

        Schema::create('stash_logs', function (Blueprint $table) {
            $table->id();
            $table->string('operation', 150);
            $table->integer('item_id');
            $table->integer('count');
            $table->integer('coins');
        });

        Schema::create('motd_logs', function (Blueprint $table) {
            $table->id();
            $table->text('motd');
        });

        Schema::create('upgrade_logs', function (Blueprint $table) {
            $table->id();
            $table->string('action', 20);
            $table->integer('upgrade_id');
            $table->integer('recipe_id')->nullable();
        });

        Schema::create('invite_decline_logs', function (Blueprint $table) {
            $table->id();
            $table->string('declined_by', 150);
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('join_logs');
        Schema::dropIfExists('invite_logs');
        Schema::dropIfExists('kick_logs');
        Schema::dropIfExists('rank_change_logs');
        Schema::dropIfExists('treasury_logs');
        Schema::dropIfExists('stash_logs');
        Schema::dropIfExists('motd_logs');
        Schema::dropIfExists('upgrade_logs');
        Schema::dropIfExists('invite_decline_logs');
    }
}
