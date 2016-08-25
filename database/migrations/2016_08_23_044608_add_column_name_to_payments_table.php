<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnNameToPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
          //
        Schema::table('payments', function($table)
        {
            $table->string('name')->after('id');
        });

        Schema::table('states', function($table)
        {
            $table->string('name')->after('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        //
        Schema::table('payments', function($table)
        {
            $table->dropColumn('name');
        });

        Schema::table('states', function($table)
        {
            $table->dropColumn('name');
        });
    }
}
