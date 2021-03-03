<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('records', function (Blueprint $table) {
            $table->id();
            $table->string('series', 64);
            $table->string('tally', 64)->unique()->nullable();
            $table->foreignId('origin');
            $table->foreign('origin')->references('id')->on('warehouses')->onDelete('restrict');
            $table->foreignId('destination');
            $table->foreign('destination')->references('id')->on('warehouses')->onDelete('restrict');
            $table->string('nop', 32)->nullable();
            $table->smallInteger('unit')->autoIncrement(false)->nullable();
            $table->string('status', 16);
            $table->string('confirm_status', 16)->nullable();
            $table->timestamp('confirm_at')->nullable();
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
        Schema::dropIfExists('records');
    }
}
