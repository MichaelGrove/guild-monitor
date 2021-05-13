<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistoryItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('history_items', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('log_id')->unique();
            $table->string('log_type', 255);
            $table->bigInteger('metable_id');
            $table->string('metable_type');
            $table->dateTime('log_datetime');
            $table->string('log_user', 255);
            $table->text('event_description')->nullable();
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
        Schema::dropIfExists('history_items');
    }
}
