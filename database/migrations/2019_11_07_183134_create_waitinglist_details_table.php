<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWaitinglistDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('waitinglist_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('revervationid');
            $table->integer('tariffid');
            $table->double('ammount');
            $table->double('unitcost');
            $table->double('totalcost');
            $table->integer('companyid');
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
        Schema::dropIfExists('waitinglist_details');
    }
}
