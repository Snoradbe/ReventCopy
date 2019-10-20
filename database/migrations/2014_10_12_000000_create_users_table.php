<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('server_1')->create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('username');
            $table->string('email');
            $table->string('password');
            $table->integer('cash')->default(0)->comment('Донат поинты');
            $table->integer('coins')->default(0)->comment('Игровая валюта');
            $table->integer('bank')->default(0)->comment('В банке');
            $table->integer('online')->default(0);
            $table->smallInteger('level')->default(1);
            $table->string('phone', 6)->nullable();
            $table->enum('sex', ['m', 'w']);
            $table->tinyInteger('age');
            $table->string('race');
            $table->string('nation');
            $table->bigInteger('job_id')->unsigned()->nullable();
            $table->bigInteger('fraction_id')->unsigned()->nullable();
            $table->bigInteger('fraction_rank_id')->unsigned()->nullable();
            $table->boolean('med')->default(false)->comment('Мед-карта');
            $table->boolean('addiction')->default(false)->comment('Зависимость');
            $table->bigInteger('partner_id')->nullable();
            $table->integer('crimes')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
