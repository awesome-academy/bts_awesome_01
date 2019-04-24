<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddProvinceIdToDays extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasColumn('days', 'province_id'))
        {
            Schema::table('days', function($table) {
                $table->integer('province_id')->unsigned();
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
        if (Schema::hasColumn('days', 'province_id'))
        {
            Schema::table('days', function($table) {
                $table->dropColumn('province_id')->unsigned();
            });
        }
    }
}
