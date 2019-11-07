<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvocesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoces', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('type')->comment(' (F = factura,B=  boleta,  NC= nota de credito,ND=  nota de debito	');
            $table->string('detail');
            $table->string('documentnumber');
            $table->integer('reservationid');
            $table->string('invocedate');
            $table->string('receptiondate');
            $table->string('net');
            $table->string('igv');
            $table->string('total');
            $table->integer('currencyid');
            $table->integer('contactid');
            $table->integer('userid');
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
        Schema::dropIfExists('invoces');
    }
}
