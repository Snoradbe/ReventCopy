<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDonatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donates', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->text('description')->nullable();
            $table->integer('price');
            $table->bigInteger('category_id')->unsigned();
            $table->text('data')->nullable();
            $table->bigInteger('handler_id')->unsigned();

            $table->foreign('category_id')->references('id')->on('donate_categories')->onDelete('cascade');
            $table->foreign('handler_id')->references('id')->on('donate_handlers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('donates', function (Blueprint $table) {
            $table->dropForeign(['category_id']);
            $table->dropForeign(['handler_id']);
            $table->dropIfExists();
        });
    }
}
