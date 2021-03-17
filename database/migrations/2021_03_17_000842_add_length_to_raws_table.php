<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddLengthToRawsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('raws', function (Blueprint $table) {
            $table->double('length')->after('size');
            $table->double('height')->after('size');
            $table->double('width')->after('size');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('raws', function (Blueprint $table) {
            //
        });
    }
}
