<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePayLeadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pay_leads', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('lead_id')->unsigned();
            $table->foreign('lead_id')->references('id')->on('leads');
            $table->integer('company_id')->unsigned();
            $table->foreign('company_id')->references('id')->on('users');
            $table->boolean('buy_lead')->unsigned();
            $table->string('name_company');
            $table->string('timeline');
            $table->string('price');
            $table->string('description_done');
            $table->string('unic_bid');
            $table->softDeletes();
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
        Schema::drop('pay_leads');
    }
}
