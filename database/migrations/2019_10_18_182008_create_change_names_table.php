<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChangeNamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('server_1')->create('change_names', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('old_name');
            $table->string('new_name');
            $table->bigInteger('admin_id')->unsigned();
            $table->timestamp('created_at');

            $table->foreign('admin_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('change_names', function (Blueprint $table) {
            $table->dropForeign(['admin_id']);
            $table->dropIfExists();
        });
    }
}
