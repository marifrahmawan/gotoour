<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropSomeColumnAtTableTransactionsDetail extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('transaction_details', function (Blueprint $table) {
            $table->dropColumn('username');
            $table->dropColumn('nationality');
            $table->dropColumn('is_visa');
            $table->dropColumn('DOE_passport');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('transaction_details', function (Blueprint $table) {
            $table->string('username');
            $table->string('nationality');
            $table->tinyInteger('is_visa');
            $table->date('DOE_passport');
        });
    }
}
