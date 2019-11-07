<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDebtsToPaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('debts_to_pays', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('reservationid');
            $table->integer('tourid');
            $table->string('duedate');
            $table->integer('currencyid');
            $table->string('exchangerate');
            $table->integer('contactid');
            $table->double('totalcost')->comment('(monto total a pagar)');
            $table->double('paycost')->comment('(monto pagado)');
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
        Schema::dropIfExists('debts_to_pays');
    }
}
