<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('tourid');
            $table->integer('contactid');
            $table->string('inputdate')->nullable();
            $table->string('hourin')->nullable();
            $table->string('dateout')->nullable();
            $table->string('hourout')->nullable();
            $table->string('flightin')->nullable();
            $table->string('flightout')->nullable();
            $table->string('totalcost')->nullable();
            $table->integer('currencyid')->nullable();
            $table->string('status')->comment('(C= confirmada, p=pendiente, a= anulada, w=waitinglist )');
            $table->string('paydate');            
            $table->string('confirmationnumber');
            $table->string('comment')->nullable();
            $table->string('pickup')->nullable()->comment('(de que lugar espec+ifico lo van a recoger)');
            $table->string('dropoff')->nullable()->comment('(lugar específico donde se le deja al cliente)');
            $table->integer('languageid')->nullable();
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
        Schema::dropIfExists('reservations');
    }
}
