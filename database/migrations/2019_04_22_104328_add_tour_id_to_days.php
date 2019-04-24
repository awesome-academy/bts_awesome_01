<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTourIdToDays extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasColumn('days', 'tour_id'))
        {
            Schema::table('days', function($table) {
                $table->integer('tour_id')->unsigned();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (Schema::hasColumn('days', 'tour_id'))
        {
            Schema::table('days', function($table) {
                $table->dropColumn('tour_id')->unsigned();
            });
        }
    }
}
