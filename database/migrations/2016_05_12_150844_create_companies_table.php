<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('fio');
            $table->string('phone');
            $table->string('name_company');
            $table->string('ogrn');
            $table->string('inn');
            $table->text('yur_adress');
            $table->text('fact_adress');
            $table->string('phone_company');
            $table->string('fio_boss');
            $table->text('description_company');
            $table->string('name_bank');
            $table->string('bik');
            $table->string('k_c');
            $table->string('p_c');
            $table->string('name_license');
            $table->string('date_license');
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
        Schema::drop('companies');
    }
}
