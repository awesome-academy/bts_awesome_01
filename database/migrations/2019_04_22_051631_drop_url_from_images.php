<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropUrlFromImages extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasColumn('images', 'url'))
        {
            Schema::table('images', function($table) {
                $table->dropColumn('url');
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
        if (!Schema::hasColumn('images', 'url'))
        {
            Schema::table('images', function($table) {
                $table->string('url');
            });
        }
    }
}
