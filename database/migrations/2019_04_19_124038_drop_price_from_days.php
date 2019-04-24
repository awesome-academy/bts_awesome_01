<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropPriceFromDays extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasColumn('days', 'price'))
        {
            Schema::table('days', function($table) {
                $table->dropColumn('price');
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
        if (!Schema::hasColumn('days', 'price'))
        {
            Schema::table('days', function($table) {
                $table->float('price');
            });
        }
    }
}
