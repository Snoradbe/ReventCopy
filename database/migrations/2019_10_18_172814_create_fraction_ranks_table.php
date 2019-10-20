<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFractionRanksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('server_1')->create('fraction_ranks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('fraction_id')->unsigned();
            $table->tinyInteger('rank')->unsigned();
            $table->string('name');

            $table->foreign('fraction_id')->references('id')->on('fractions')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('fraction_ranks', function (Blueprint $table) {
            $table->dropForeign(['fraction_id']);
            $table->dropIfExists();
        });
    }
}
