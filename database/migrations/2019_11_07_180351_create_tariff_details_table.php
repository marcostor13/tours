<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTariffDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tariff_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('tariffid')->nullable();
            $table->integer('room_typeid')->nullable();
            $table->string('roomname')->nullable();
            $table->string('cost')->nullable();
            $table->string('minpax')->nullable();
            $table->string('maxpax')->nullable();
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
        Schema::dropIfExists('tariff_details');
    }
}
