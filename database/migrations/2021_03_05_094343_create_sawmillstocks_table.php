<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSawmillstocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sawmillstocks', function (Blueprint $table) {
            $table->id();
            $table->string('series', 64)->unique();
            $table->foreignId('raw_id');
            $table->foreign('raw_id')->references('id')->on('raws')->onDelete('restrict');
            $table->string('nop');
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
        Schema::dropIfExists('sawmillstocks');
    }
}
