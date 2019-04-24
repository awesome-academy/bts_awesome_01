<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropTourDaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('tour_days');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::create('tour_days', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('tour_id')->unsigned();
            $table->integer('day_id')->unsigned();
            $table->timestamps();
        });
    }
}
