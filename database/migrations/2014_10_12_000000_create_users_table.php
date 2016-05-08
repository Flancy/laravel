<?php

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
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('policy');
            $table->string('fio');
            $table->string('phone');
            $table->string('email')->unique();
            $table->string('login')->unique();
            $table->string('password');
            $table->string('name-company');
            $table->string('ogrn');
            $table->string('inn');
            $table->text('yur-adress');
            $table->string('fact-adress');
            $table->string('phone-company');
            $table->string('fio-boss');
            $table->text('description-company');
            $table->string('name-bank');
            $table->string('bik');
            $table->string('k-c');
            $table->string('p-c');
            $table->string('name-license');
            $table->string('date');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }
}
