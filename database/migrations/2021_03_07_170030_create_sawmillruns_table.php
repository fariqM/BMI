<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSawmillrunsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sawmillruns', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sawmillstock_id');
            $table->foreign('sawmillstock_id')->references('id')->on('sawmillstocks')->onDelete('restrict');
            $table->string('nop',32);
            $table->string('status', 32);
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
        Schema::dropIfExists('sawmillruns');
    }
}
