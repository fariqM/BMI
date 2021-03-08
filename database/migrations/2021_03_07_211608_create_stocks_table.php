<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stocks', function (Blueprint $table) {
            $table->id();
            $table->string('name', 64);
            $table->string('tally', 64)->unique();
            $table->double('size');
            $table->double('height')->nullable();
            $table->double('width')->nullable();
            $table->double('length')->nullable();
            $table->foreignId('sawmillrun_id');
            $table->foreign('sawmillrun_id')->references('id')->on('sawmillruns')->onDelete('restrict');
            $table->foreignId('type_id');
            $table->foreign('type_id')->references('id')->on('types')->onDelete('restrict');
            $table->foreignId('unit_measure_id');
            $table->foreign('unit_measure_id')->references('id')->on('unit_measures')->onDelete('restrict');
            $table->foreignId('origin');
            $table->foreign('origin')->references('id')->on('warehouses')->onDelete('restrict');
            $table->foreignId('warehouse_id');
            $table->foreign('warehouse_id')->references('id')->on('warehouses')->onDelete('restrict');
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
        Schema::dropIfExists('stocks');
    }
}
