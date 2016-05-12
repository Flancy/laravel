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
            $table->integer('company_id')->unsigned();
            $table->boolean('buy_lead')->unsigned();
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
