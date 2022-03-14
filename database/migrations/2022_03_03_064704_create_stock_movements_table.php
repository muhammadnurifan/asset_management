<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStockMovementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stock_movements', function (Blueprint $table) {
            $table->id();
            $table->string('document_number')->unique();
            $table->date('posting_date');
            $table->string('type');
            $table->bigInteger('source_location_id')->unsigned();
            $table->foreign('source_location_id')->references('id')->on('locations');
            $table->bigInteger('source_floor_id')->unsigned();
            $table->foreign('source_floor_id')->references('id')->on('floors');
            $table->bigInteger('source_room_id')->unsigned();
            $table->foreign('source_room_id')->references('id')->on('rooms');
            $table->bigInteger('destination_location_id')->unsigned()->nullable();
            $table->foreign('destination_location_id')->references('id')->on('locations');
            $table->bigInteger('destination_floor_id')->unsigned()->nullable();
            $table->foreign('destination_floor_id')->references('id')->on('floors');
            $table->bigInteger('destination_room_id')->unsigned()->nullable();
            $table->foreign('destination_room_id')->references('id')->on('rooms');
            $table->string('status');
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
        Schema::dropIfExists('stock_movements');
    }
}
