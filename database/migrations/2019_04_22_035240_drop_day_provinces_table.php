<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropDayProvincesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('day_provinces');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::create('day_provinces', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('tour_id')->unsigned();
            $table->integer('province_id')->unsigned();
            $table->timestamps();
        });
    }
}
