<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNopVirtualToSawmillstocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sawmillstocks', function (Blueprint $table) {
            $table->string('nop_virtual',32)->nullable()->after('nop');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sawmillstocks', function (Blueprint $table) {
            //
        });
    }
}
