<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddImageIdToTours extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasColumn('tours', 'image_id'))
        {
            Schema::table('tours', function($table) {
                $table->integer('image_id')->unsigned();
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
        if (Schema::hasColumn('tours', 'image_id'))
        {
            Schema::table('tours', function($table) {
                $table->dropColumn('image_id')->unsigned();
            });
        }
    }
}
